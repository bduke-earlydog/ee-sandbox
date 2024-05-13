<?php

namespace TripleNerdScore\LiveUrl\Models;

use ExpressionEngine\Service\Model\Model;

class Setting extends Model
{
    protected static $_primary_key = 'setting_id';
    protected static $_table_name = 'live_url_settings';

    // Add your properties as protected variables here
    protected $setting_id;
    protected $site_id;
    protected $channel_id;
    protected $url;

    protected static $_relationships = [
        'Channel' => [
            'type' => 'BelongsTo',
            'model' => 'ee:Channel',
            'from_key' => 'channel_id',
            'to_key' => 'channel_id',
            'inverse' => [
                'name' => 'LiveUrl',
                'type' => 'HasOne',
            ],
        ],
    ];
}
