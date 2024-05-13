<?php

namespace Avenu\ThrottleWhitelist\Extensions;

use ExpressionEngine\Service\Addon\Controllers\Extension\AbstractRoute;

class CoreBoot extends AbstractRoute
{
    public function process()
    {
        if(ee()->config->item('enable_throttling') == 'y') {
            $whitelist = ee()->config->item('throttling_whitelist');
            if(is_array($whitelist) && count($whitelist) >= 1) {
                ee()->db->where_in('ip_address', $whitelist)->delete('throttle');
            }
        }
    }
}
