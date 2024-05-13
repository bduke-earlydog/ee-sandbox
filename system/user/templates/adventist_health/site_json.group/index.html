<?php
header('Content-Type: application/json');
$j = 0;
$today = strtotime('today midnight');
$event_cards = [];
ob_start();
?>
  {exp:channel:entries channel="events" 
    backspace="1" 
    dynamic="no"
    limit=""
    category="{if segment_4 != 'all'}{segment_4}{/if}{if segment_4 != 'all' && segment_5 != 'all'}&{/if}{if segment_5 != 'all'}{segment_5}{/if}"
  }
<?php
$test ='{events_event_date}';
$evt_type = '{event_type}';
if( $evt_type == 'standard') {
    ?>
    {events_event_dates}    
        <?php 
        if('{events_event_dates:date}' > $today) {
            $hdate = '{events_event_dates:date}';
            $hdate = date('n-j-y', $hdate);

            $event_cards[$j]['title'] = htmlentities("{events_title}", ENT_QUOTES); 
            $event_cards[$j]['url_title'] = htmlentities("{url_title}", ENT_QUOTES); 
            $event_cards[$j]['tag'] = htmlentities("{categories show_group='13' backspace='2'}{category_name}, {/categories}", ENT_QUOTES);
            $event_cards[$j]['market'] = htmlentities("{categories show_group='1'}{category_name} {/categories}", ENT_QUOTES);
            $event_cards[$j]['image'] = htmlentities('{events_image}', ENT_QUOTES);
            $event_cards[$j]['link'] = '/events/' . urlencode("{url_title}").'/'.$hdate;
            $event_cards[$j]['entry_id'] = '{entry_id}';
            $event_cards[$j]['edate'] = "{events_event_dates:date format='%F %j, %Y'}";
            $event_cards[$j]['etime'] = htmlentities('{events_event_dates:event_time}', ENT_QUOTES);
            $event_cards[$j]['timestamp'] = "{events_event_dates:date}";
            $event_cards[$j]['etype'] = htmlentities('{event_type}', ENT_QUOTES);
            $j++;
        }
       ?>
    {/events_event_dates}
    <?php
}
else if($evt_type == 'ongoing') {
    $event_cards[$j]['title'] = htmlentities("{events_title}", ENT_QUOTES);
    $event_cards[$j]['url_title'] = htmlentities('{url_title}', ENT_QUOTES);
    $event_cards[$j]['tag'] = htmlentities("{categories show_group='13' backspace='2'}{category_name}, {/categories}", ENT_QUOTES);
    $event_cards[$j]['market'] = htmlentities("{categories show_group='1'}{category_name} {/categories}", ENT_QUOTES);
    $event_cards[$j]['image'] = htmlentities('{events_image}', ENT_QUOTES);
    $event_cards[$j]['link'] = '/events/' . urlencode('{url_title}');
    $event_cards[$j]['entry_id'] = '{entry_id}';
    $event_cards[$j]['edate'] = "{events_event_date format='%F %j, %Y'}";
    $event_cards[$j]['etime'] = htmlentities('{events_event_time}', ENT_QUOTES);
    $event_cards[$j]['timestamp'] = $test;
    $event_cards[$j]['etype'] = htmlentities('{event_type}', ENT_QUOTES);
    $j++;
}
?>
{/exp:channel:entries}
<?php
usort($event_cards, function ($a, $b) {
    return $a['timestamp'] <=> $b['timestamp'];
});

$json = json_encode($event_cards, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo $json;
// echo '<pre>';print_r($event_cards);
ob_end_flush();
?>
