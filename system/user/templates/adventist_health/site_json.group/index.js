{exp:channel:entries channel="nav" entry_id='{segment_2}' dynamic="no" cache="yes" refresh="10" cache_prefix="global"}
{if no_results}{/if}
<?php
	$site_config['market_name'] = '{title}';
	$site_config['market_url'] = '{url_title}';
	$j = 0;
?>
<?php
	$nav_logo_header = '{nav_logo_header}';
	$site_config['nav_logo_header'] = $nav_logo_header;
	$j = 0;
?>
{nav_topnav}    
<?php
	$nav_topnav[$j]['link_label'] = '{nav_topnav:link_label:label}';
	$nav_topnav[$j]['link_url'] = '{nav_topnav:link_url}';
	$j++;
?>
{/nav_topnav}
<?php
	$site_config['nav_topnav'] = serialize($nav_topnav);
	$nav_logo_footer = '{nav_logo_footer}';
	$nav_address_1 = '{nav_address_1}';
	$nav_address_2 = '{nav_address_2}';
	$nav_city = '{nav_city}';
	$nav_state = '{nav_state}';
	$nav_zip_code = '{nav_zip_code}';
	$nav_phone = '{nav_phone}';
	$site_config['nav_logo_footer'] = $nav_logo_footer;
	$site_config['nav_address_1'] = $nav_address_1;
	$site_config['nav_address_2'] = $nav_address_2;
	$site_config['nav_city'] = $nav_city;
	$site_config['nav_state'] = $nav_state;
	$site_config['nav_zip_code'] = $nav_zip_code;
	$site_config['nav_phone'] = $nav_phone;
	$nav_facebook_url = '{nav_facebook_url}';
	$nav_twitter_url = '{nav_twitter_url}';
	$nav_linkedin_url = '{nav_linkedin_url}';
	$nav_instagram_url = '{nav_instagram_url}';
	$site_config['nav_facebook_url'] = $nav_facebook_url;
	$site_config['nav_twitter_url'] = $nav_twitter_url;
	$site_config['nav_linkedin_url'] = $nav_linkedin_url;
	$site_config['nav_instagram_url'] = $nav_instagram_url;
	$nav_market_active = '{nav_market_active}';
	$nav_market_region = '{nav_market_region:label}';
	$nav_market_image = '{nav_market_image}';
	$nav_market_link = '{nav_market_link}';
	$site_config['nav_market_active'] = $nav_market_active;
	$site_config['nav_market_region'] = $nav_market_region;
	$site_config['nav_market_image'] = $nav_market_image;
	$site_config['nav_market_link'] = $nav_market_link;
	$j = 0;
?>
{nav_quick_links}    
<?php
	$nav_quick_links[$j]['link_label'] = '{nav_quick_links:link_label}';
	$nav_quick_links[$j]['link_url'] = '{nav_quick_links:link_url}';
	$j++;
?>
{/nav_quick_links}
<?php
	$site_config['nav_quick_links'] = serialize($nav_quick_links);
	$j = 0;
?>
{nav_helpful_resources}    
<?php
	$nav_helpful_resources[$j]['link_label'] = '{nav_helpful_resources:link_label}';
	$nav_helpful_resources[$j]['link_url'] = '{nav_helpful_resources:link_url}';
	$j++;
?>
{/nav_helpful_resources}
<?php
	$site_config['nav_helpful_resources'] = serialize($nav_helpful_resources);
?>
{nav_overrides}    
<?php
	$nav_overrides_url = '{nav_overrides:link_url}';
	if ($nav_overrides_url != '') {
	    $nav_overrides['{nav_overrides:link_label}'] = '{nav_overrides:link_url}';
	}
?>
{/nav_overrides}
<?php
	$site_config['nav_overrides'] = serialize($nav_overrides);
?>
{/exp:channel:entries}
<?php
	header('Content-Type: application/json');
	$json = json_encode($site_config);
	echo $json;
?>
