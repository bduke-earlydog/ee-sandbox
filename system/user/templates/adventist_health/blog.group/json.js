{exp:http_header content_type="application/json"}
[
  {exp:channel:entries channel="blog" 
  	backspace="1" 
  	limit="{segment_4}"
  	search:news_year="{segment_3}"
  }
  {
    "image" : "{news_image}",
    "tag" : "{categories show_group="3"}{category_name}{/categories}",
    "title" : "{news_headline:attr_safe}",
    "publish_date" : "{news_publish_date format="%F %j, %Y"}",    
    "link"  : "/blog/{news_year}/{news_month}/{url_title}/",
    "entry_id" : "{entry_id}"

  },{/exp:channel:entries}
]
