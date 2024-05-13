<?php

namespace TripleNerdScore\LiveUrl\Services;

class SettingsService
{
    public function form()
    {
        $channels = $this->getChannels();
        $liveSettings = ee('Model')->get('live_url:Setting')->all();

        $output = [];

        foreach ($channels as $ch) {
            $item = [
                'channel_id' => $ch->channel_id,
                'channel_name' => $ch->channel_name,
                'channel_title' => $ch->channel_title,
            ];

            $item['live_url'] = $liveSettings->filter('channel_id', $ch->channel_id)->first()
                ? $liveSettings->filter('channel_id', $ch->channel_id)->first()->url
                : '';

            $output[] = $item;
        }

        $vars['channels'] = $output;

        $vars['post_url'] = ee('CP/URL')->make('addons/settings/live_url/save');
        return ee('View')->make('live_url:form')->render($vars);
    }

    public function save()
    {
        $churls = ee()->input->post('channel_url');
        $chids = ee()->input->post('channel_id');
        $liveSettings = ee('Model')->get('live_url:Setting')->all();
        foreach ($chids as $key => $chid) {
            if (isset($chids[$key]) && !empty($chids[$key])) {
                if ($lu = $liveSettings->filter('channel_id', $chid)->first()) {
                    $lu->url = $churls[$key];
                    $lu->save();
                } else {
                    $lu = ee('Model')->make(
                        'live_url:Setting',
                        [
                            'channel_id' => $chid,
                            'url' => $churls[$key],
                        ]
                    );
                    $lu->save();
                }
            }
        }
        return true;
    }

    private function getChannels()
    {
        $channels = ee('Model')->get('Channel')
                        ->fields('channel_id', 'channel_name', 'channel_title')
                        ->all();

        return $channels;
    }
}
