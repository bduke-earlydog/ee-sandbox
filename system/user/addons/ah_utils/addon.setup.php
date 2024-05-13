<?php

use Avenu\AhUtils\Services\UrlService;
use Avenu\AhUtils\Services\MarketsService;
use Avenu\AhUtils\Services\HomeService;
use Avenu\AhUtils\Services\EntryService;
use Avenu\AhUtils\Services\SalesforceService;

return [
    'name'              => 'Adventis Health Utilities',
    'description'       => 'Custom functionality for the site',
    'version'           => '1.0.0',
    'author'            => 'Avenu',
    'author_url'        => 'fdsa',
    'namespace'         => 'Avenu\AhUtils',
    'settings_exist'    => false,
    'services' => [
        'UrlService' => function ($addon) {
            return new UrlService();
        },
        'HomeService' => function ($addon) {
            return new HomeService();
        },
        'EntryService' => function ($addon) {
            return new EntryService();
        },
        'SalesforceService' => function ($addon) {
            return new SalesforceService();
        },
    ],
    'services.singletons' => [
        'MarketsService' => function ($addon) {
            return new MarketsService();
        },
    ],
    'models' => [
        'LandingRegistration'    => 'Model\LandingRegistration',

    ],
 
];
