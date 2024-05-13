<?php

namespace Avenu\AhUtils\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;

class MarketNotifications extends AbstractRoute
{
    public function process()
    {
        $market = ee()->TMPL->fetch_param('market');
        $notifications = ee('ah_utils:HomeService')->getMarketNotifications($market);
        if (!$notifications) {
            return;
        }

        $cookie_name_alert = 'ahn-' . $market . '-a';
        $cookie_name_general = 'ahn-' . $market . '-g';
        $cookie_test_alert = $_COOKIE[$cookie_name_alert] ?? null;
        $cookie_test_general = $_COOKIE[$cookie_name_general] ?? null;

        $data = [];
        foreach ($notifications as $notification) {
            $notification['copy'] = $this->removeQuotesDivAndSemicolon($notification['copy']);
            if ($notification['type'] == 'alert' and !$cookie_test_alert) {
                $data[] = $notification;
            } elseif ($notification['type'] == 'general' and !$cookie_test_general) {
                $data[] = $notification;
            }
        }

        if($data) {
            return ee()->TMPL->parse_variables(ee()->TMPL->tagdata, $data);
        }
    }

    protected function removeQuotesDivAndSemicolon(string $string)
    {
        $stringWithoutDiv = str_replace('</div>', '', $string);
        $trimmedString = trim($stringWithoutDiv);
        $trimmedString = trim($trimmedString, "'");
        $trimmedString = rtrim($trimmedString, ';');
        $trimmedString = trim($trimmedString, "'");
        return $trimmedString;
    }
}