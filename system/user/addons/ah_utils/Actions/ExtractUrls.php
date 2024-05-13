<?php

namespace Avenu\AhUtils\Actions;

use ExpressionEngine\Service\Addon\Controllers\Action\AbstractRoute;

class ExtractUrls extends AbstractRoute
{
    /**
     * @var array|string[]
     */
    protected array $urls = [
        'hra.adventisthealth.org',
        'adventisthealthhra.org',
        'ha.healthawareservices.com',
    ];

    public function process()
    {
        $entry_ids = [];
        $channel_tables = ee('ah_utils:UrlService')->getChannelTables();
        foreacH($channel_tables AS $id => $table) {
            $entries = ee('ah_utils:UrlService')->searchTable($table, $id, $this->urls);
            if($entries) {
                $entry_ids = $entries + $entry_ids;
            }
        }

        $grid_tables = ee('ah_utils:UrlService')->getGridTables();
        foreacH($grid_tables AS $id => $table) {
            $entries = ee('ah_utils:UrlService')->searchTable($table, $id, $this->urls);
            if($entries) {
                $entry_ids = $entries + $entry_ids;
            }
        }

        print_r($entry_ids);
        exit;
    }
}
