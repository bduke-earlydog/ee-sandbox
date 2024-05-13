{exp:http_header content_type="application/json"}
[
  {exp:channel:entries channel="news" 
    backspace="1" 
    limit="{segment_4}"
    search:news_year="{if segment_3 != 'all'}{segment_3}{/if}"
    search:news_copy="{if segment_5 != 'all'}{segment_5}{/if}"
    category="{if segment_6 != 'all'}{segment_6}{/if}"
    orderby = 'news_publish_date'
    sort = 'desc'
  }
  {
    "image" : "{news_image}",
    "tag" : "{categories show_group="8" backspace="2"}{category_name}, {/categories}",
    "title" : "{news_headline:attr_safe}",
    "publish_date" : "{news_publish_date format="%F %j, %Y"}",    
    "link"  : "/news/{news_year}/{news_month}/{url_title}/",
    "entry_id" : "{entry_id}"

  },{/exp:channel:entries}
]
