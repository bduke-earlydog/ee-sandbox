{exp:http_header content_type="application/json"}<?php

// ------------------------------------------
//  zipcode and mileage functions
// ------------------------------------------
$search = '';
$FLAG_ZIP = false;
$aZips = [];
$aEid = [];

function getDistanceByZipcode($zipcode, $aSearch) {
    foreach ($aSearch as $item) {
        if ($item['zipcode'] === $zipcode) {
            return $item['distance']; // Returns distance in miles for the specified ZIP code
        }
    }
    return false; // Return false if the ZIP code is not found
}

function getLatLon($zipcode) {
    $zipcode = ee()->db->escape_str($zipcode);
    $query = ee()->db->select('lat, lon')->from('exp_avenu_zip')->where('zipcode', $zipcode)->limit(1)->get();
    
    if ($query->num_rows() === 1) {
        return $query->row_array(); // Use row_array() for a single result
    } else {
        return false;
    }
}

function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // Radius of the earth in km

    $dLat = deg2rad($lat2 - $lat1);  
    $dLon = deg2rad($lon2 - $lon1);  
    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon/2) * sin($dLon/2); 
    $c = 2 * atan2(sqrt($a), sqrt(1-$a)); 
    $distance = $earthRadius * $c; // Distance in km
    $distance = $distance * 0.621371; // Convert km to miles
    return $distance;
}

function zipcodeRadius($lat, $lon, $radius) {
    $radius = $radius ?: 50; // Default radius to 50 if not specified
    $lat = ee()->db->escape($lat);
    $lon = ee()->db->escape($lon);    
    $sql = "SELECT zipcode, lat, lon FROM exp_avenu_zip 
            WHERE (3958*3.1415926*sqrt((lat-{$lat})*(lat-{$lat}) + cos(lat/57.29578)*cos({$lat}/57.29578)*(lon-{$lon})*(lon-{$lon}))/180) <= {$radius}";
    

    $query = ee()->db->query($sql);
    return $query->result();
}

function getDistance($arrayOfElements, $zipcode) {
    foreach ($arrayOfElements as $element) {
        if (isset($element['zipcode']) && $element['zipcode'] == $zipcode) {
            return $element['distance'] ?? null; // Return the distance if found, else null
        }
    }
    return null; // Return null if no matching zipcode is found
}



// ------------------------------------------
//  main logic: check for zip/r
// ------------------------------------------
$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$limit = $uriSegments[3];
if($limit == 'all') $limit=999;
$user_cat = $uriSegments[4];
$user_market = $uriSegments[5];
$userzip = $uriSegments[6];;
$userradius = $uriSegments[7];


if(isset($userzip) and $userzip != '' and isset($userradius) and $userradius != '') {
    $FLAG_ZIP = true;
    $mylatlon = getLatLon($userzip);
    if(is_array($mylatlon)) {
        $results = zipcodeRadius($mylatlon['lat'], $mylatlon['lon'], $userradius);
        $aSearch = [];
        foreach($results as $result) {
            $distance = calculateDistance($mylatlon['lat'], $mylatlon['lon'], $result->lat, $result->lon);
            $distanceFormatted = round($distance, 2);            
            $aZips[] = $result->zipcode;  // just the zips
            $aSearch[] = [
                'zipcode' => $result->zipcode,
                'distance' => $distanceFormatted, // Distance in miles
                'lat' => $result->lat,
                'lon' => $result->lon
            ];
        }
        // Sort $aSearch by 'distance' in ascending order
        usort($aSearch, function($a, $b) {
            return $a['distance'] <=> $b['distance'];
        });
        $search = implode("|", $aZips); //  zips by |
    } else {
        $search = $userzip;
    }
}
// echo $search;exit;
//  show zip ordered by mileage
// echo '<pre>';print_r($aSearch);exit;
// ------------------------------------------

if($FLAG_ZIP) {


    // ------------------------------------------
    //  prep search
    // ------------------------------------------
    $aZips2 = [];
    if (!empty($aSearch)) {
        foreach($aSearch as $v) {
            $aZips2[] = $v['zipcode'];
        }
    }

    // echo '<pre>';print_r($aZips2);exit;


    // ------------------------------------------
    //  find entries that match zip
    // ------------------------------------------
    $sql = "SELECT * FROM exp_channel_data_field_72 WHERE 1=0"; // Default to no results query
    if (!empty($aZips2)) {
        $zipCodesForSql = implode("', '", $aZips2);
        $sql = "SELECT *, CASE ";
        foreach ($aZips2 as $index => $zipCode) {
            $sql .= "WHEN field_id_72 = '$zipCode' THEN " . ($index + 1) . " ";
        }
        $sql .= "ELSE 9999 END AS ZipOrder FROM exp_channel_data_field_72 WHERE field_id_72 IN ('$zipCodesForSql') ORDER BY ZipOrder ASC";
    }
    // echo $sql;exit;

    // ------------------------------------------
    // prep entry_ids as custom
    // ------------------------------------------
    $query = ee()->db->query($sql);
    $eid = '';
    foreach ($query->result() as $result) {
        // echo $result->entry_id . '<br>';
        $aEid[] = $result->entry_id;
    }
    $entry_ids = implode("|", $aEid);

    $custom_entry_ids = implode(",", $aEid);
    // ------------------------------------------

    //  add AND ecp.cat_id = $cat_id  -- Filtering by cat_id if cat_id is not all
    $catsearch = '';
    if($user_cat != '' AND $user_cat != 'all') {
        $user_cat = (int) $user_cat;
        $catsearch = "AND ecp.cat_id = $user_cat";
    }
    // echo $user_cat;exit;
    // echo $catsearch;exit;
    $query = "SELECT 
        ct.entry_id,
        ct.title, 
        ct.url_title, 
        cd3.field_id_65 AS digital_name, 
        cd2.field_id_68 AS street, 
        cd4.field_id_69 AS suite, 
        cd5.field_id_70 AS city,
        cd6.field_id_71 AS state,
        cd.field_id_72 AS zip_code,
        cd7.field_id_108 AS image,
        GROUP_CONCAT(DISTINCT CASE WHEN ec.group_id = 1 THEN ec.cat_name END SEPARATOR ', ') AS market,
        GROUP_CONCAT(DISTINCT CASE WHEN ec.group_id = 12 THEN ec.cat_name END SEPARATOR ', ') AS cat
        FROM exp_channel_titles AS ct
        JOIN exp_channel_data_field_72 AS cd ON ct.entry_id = cd.entry_id
        JOIN exp_channel_data_field_68 AS cd2 ON ct.entry_id = cd2.entry_id
        JOIN exp_channel_data_field_65 AS cd3 ON ct.entry_id = cd3.entry_id
        JOIN exp_channel_data_field_69 AS cd4 ON ct.entry_id = cd4.entry_id
        JOIN exp_channel_data_field_70 AS cd5 ON ct.entry_id = cd5.entry_id
        JOIN exp_channel_data_field_71 AS cd6 ON ct.entry_id = cd6.entry_id
        JOIN exp_channel_data_field_108 AS cd7 ON ct.entry_id = cd7.entry_id
        LEFT JOIN exp_category_posts AS ecp ON ct.entry_id = ecp.entry_id
        LEFT JOIN exp_categories AS ec ON ecp.cat_id = ec.cat_id AND ec.group_id IN (1, 12)
        WHERE ct.entry_id IN ($custom_entry_ids)
$catsearch
        GROUP BY ct.entry_id, ct.title, ct.url_title, cd3.field_id_65, cd2.field_id_68, cd4.field_id_69, cd5.field_id_70, cd6.field_id_71, cd.field_id_72, cd7.field_id_108
        ORDER BY FIELD(ct.entry_id, $custom_entry_ids) LIMIT $limit;

    ";
    // echo $query;exit;

    // ------------------------------------------
    // get location data and create json
    // ------------------------------------------
    $dataArray = [];
    if (!empty($custom_entry_ids)) {
        $results = ee()->db->query($query);
        if ($results->num_rows() == 0) {
            // Send an empty response
            echo json_encode([]);
        } 
        else {
            foreach ($results->result() as $row) {
                $distance = getDistance($aSearch, $row->zip_code);
                $dataArray[] = [
                    "title" => "$row->digital_name",
                    "url_title" => "$row->url_title",
                    "tag" => "$row->cat",
                    "market" => "$row->market",
                    "image" => "$row->image",
                    "link" => "/locations/$row->url_title/",
                    "entry_id" => "$row->entry_id",
                    "street" => "$row->street",
                    "suite" => "$row->suite",
                    "city" => "$row->city",
                    "state" => "$row->state",
                    "zipcode" => "$row->zip_code",
                    "distance" => "$distance",
                    "absolute_results" => "",
                    "etype" => "",
                ];
            }

            //$jsonData = json_encode($dataArray, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
            $jsonData = json_encode($dataArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            echo $jsonData;
        }
    }
}
else {
    ?>
[
  {exp:channel:entries channel="locations" 
    backspace="1" 
    dynamic="no"
    limit="{segment_3}"
    orderby="{locations_market_name}"
    sort="asc"
    category="{if segment_4 != 'all'}{segment_4}{/if}{if segment_4 != 'all' && segment_5 != 'all'}&{/if}{if segment_5 != 'all'}{segment_5}{/if}"
  }
  {
    "title" : "{locations_digital_name:attr_safe}",
    "url_title" : "{url_title}",
    "tag" : "{categories show_group="12" backspace="2"}{category_name}, {/categories}",
    "market" : "{categories show_group="1"}{category_name} {/categories}",
    "image" : "{locations_image}",
    "link"  : "/locations/{url_title}/",
    "entry_id" : "{entry_id}",
    "street" : "{locations_street:attr_safe}",
    "suite" : "{if locations_suite != ''}, Suite {locations_suite:attr_safe}{/if}",
    "city" : "{locations_city:attr_safe}",
    "state" : "{locations_state:attr_safe}",
    "zipcode" : "{locations_zipcode:attr_safe}",
    "distance" : "",
    "absolute_results" : "",
    "etype" : ""
  },{/exp:channel:entries}
]

<?php
}
?>

