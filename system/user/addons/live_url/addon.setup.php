<?php

return [
    'name'              => 'Live Url',
    'description'       => 'Live Url description',
    'version'           => '1.1.4',
    'author'            => 'tripleNERDscore',
    'author_url'        => 'https://triplenerdscore.net',
    'namespace'         => 'TripleNerdScore\LiveUrl',
    'settings_exist'    => true,
    'fieldtypes'        => [
        'LiveUrl' => [
            'name' => 'LiveUrl',
            'compatibility' => 'text',
        ],
    ],
    'requires' => [
        'php' => '7.3',
        'ee' => '7.2',
    ],
    'models' => [
        'Setting'    => 'Models\Setting',
    ],
    'services'          => [
        'SettingsService' => function ($addon) {
            return new \TripleNerdScore\LiveUrl\Services\SettingsService;
        },
    ],
    'models.dependencies' => [
        'Setting' => [
            'ee:Channel'
        ],
    ],
];
