<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Live_url_ft extends EE_Fieldtype
{
    public $info = array(
        'name'      => 'LiveUrl',
        'version'   => '1.0.0',
    );

    public function install()
    {
        return [];
    }

    public function display_global_settings()
    {
        $val = array_merge($this->settings, $_POST);

        $form = '';

        return $form;
    }

    public function save_global_settings()
    {
        return array_merge($this->settings, $_POST);
    }

    public function display_settings($data)
    {
    }

    public function save_settings($data)
    {
        return [];
    }

    public function display_field($data)
    {
        $field = $this->url();

        ee()->cp->add_to_head('<style>
            .live-url-wrapper {position: relative; background:var(--ee-main-bg); border:1px solid var(--ee-panel-border); padding:6px 12px; border-radius:5px; overflow:hidden; overflow-x:auto; box-shadow: inset 0 1px 3px 0 var(--ee-shadow-panel), 0 1px 2px -1px var(--ee-shadow-panel);}
                .live-url-wrapper {margin-top: -2.5rem; z-index: 2;} /* optional - this could be a setting option */
            .live-url-wrapper::-webkit-scrollbar {width: 5px; height: 5px; margin: 0 20px;}
            .live-url-wrapper::-webkit-scrollbar-button {width: 0px; height: 0px;}
            .live-url-wrapper::-webkit-scrollbar-thumb {background: #e1e1e1; border: 0px none #ffffff; border-radius: 20px;}
            .live-url-wrapper::-webkit-scrollbar-thumb:hover {background: #ccc;}
            .live-url-wrapper::-webkit-scrollbar-thumb:active {background: #ccc;}
            .live-url-wrapper::-webkit-scrollbar-track {background: transparent; border: 0px none #ffffff; border-radius: 20px;}
            .live-url-wrapper::-webkit-scrollbar-track:hover {background: transparent;}
            .live-url-wrapper::-webkit-scrollbar-track:active {background: transparent;}
            .live-url-wrapper::-webkit-scrollbar-corner {background: transparent;}
            .live-url-link {font-size:14px; white-space:nowrap;}
        </style>');

        return "<div class='live-url-wrapper'><a href='" . $field . "' target='_blank' class='live-url-link'>" . $field . " <i class='fal fa-external-link fa-fw'></i></a></div>";
    }

    public function replace_tag($data, $params = array(), $tagdata = false)
    {
        // This isn't something you'll want to see, or maybe it is.
        return $this->url();
    }

    public function url()
    {
        if (!($contentId = $this->content_id())) {
            return '---';
        }

        $entry = ee('Model')->get('ChannelEntry')
                    ->with('Channel')
                    ->filter('entry_id', $this->content_id())
                    ->first();
        // Specific settings
        if ($entry && $lu = ee('Model')->get('live_url:Setting')->filter('channel_id', $entry->channel_id)->first()) {
            $url = $this->getFromLu($lu, $entry);
            if ($url) {
                return $url;
            }
        }

        // Structure
        if (ee('Addon')->get('structure') && ee('Addon')->get('structure')->isInstalled()) {
            $url = $this->getFromStructure();
            if ($url) {
                return $url;
            }
        }
        // Pages
        if (isset(config_item('site_pages')[ee()->config->item('site_id')]['uris'][$contentId])) {
            return $this->getFromPages();
        }

        // Channel URL

        if (isset($entry->channel_id)) {
            $channelUrl = $this->getFromChannel($entry);
            if ($channelUrl) {
                return $channelUrl;
            } else {
                // Guess at the channel
                return $this->buildFromChannel($entry);
            }
        }

        // If we get this far, who knows.
        return '---';
    }

    public function getFromLu($lu, $entry)
    {
        $url = $lu->url;
        $tag = '{exp:channel:entries entry_id="' . $entry->entry_id . '" dynamic="no"  status="not burglars" show_future_entries="yes" cache="yes" refresh="60" cache_prefix="live_url_"}' . $url . '{/exp:channel:entries}';
        if (!isset(ee()->TMPL)) {
            ee()->load->library('template', null, 'TMPL');
        }
        ee()->TMPL->parse($tag);
        $out = ee()->TMPL->parse_globals(ee()->TMPL->final_template);
        ee()->output->set_output($out);
        $output = ee()->output->get_output();
        return $output;
    }

    public function getFromStructure()
    {
        require_once PATH_ADDONS . 'structure/sql.structure.php';
        $structure = new Sql_structure();

        $data = $structure->get_single_path($this->content_id());

        if (empty($data) || !isset($data[$this->content_id()])) {
            return null;
        }

        $structureData = $data[$this->content_id()];
        return $structureData['uri'];
    }

    public function getFromPages()
    {
        $sitePages = config_item('site_pages');
        $thisSitePages = $sitePages[ee()->config->item('site_id')];
        $url = rtrim($thisSitePages['url'], '/');
        $uri = ltrim($sitePages[ee()->config->item('site_id')]['uris'][$this->content_id()], '/');
        return $url . '/' . $uri;
    }

    public function getFromChannel($entry)
    {
        if (!$entry->Channel->channel_url) {
            return null;
        }
        return rtrim($entry->Channel->channel_url, '/') . '/' . $entry->url_title;
    }

    public function buildFromChannel($entry)
    {
        $siteUrl = ee()->config->item('site_url');
        return rtrim($siteUrl, '/') . '/' . $entry->Channel->channel_name . '/' . $entry->url_title;
    }
}
