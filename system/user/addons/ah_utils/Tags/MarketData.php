<?php

namespace Avenu\AhUtils\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;

class MarketData extends AbstractRoute
{
    // Example tag: {exp:ah_utils:market_data}
    public function process()
    {
        ee()->lang->loadfile('ah_utils');
        $market = ee()->TMPL->fetch_param('market');
        $data = ee('ah_utils:MarketsService')->getMarket($market);

        return ee()->TMPL->parse_variables_row(ee()->TMPL->tagdata, $data);
    }
}
