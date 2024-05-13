<?php

namespace Avenu\AhUtils\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;

class CtaIcons extends AbstractRoute
{
    /**
     * @var array
     */
    protected array $market_data = [];

    /**
     * @var string
     */
    protected string $patient_login = '';

    /**
     * @var string
     */
    protected string $find_a_doctor_url = '';

    /**
     * @var string
     */
    protected string $find_a_location_url = '';

    /**
     * @var string
     */
    protected string $explore_services_url = '';

    public function process()
    {
        ee()->lang->loadfile('ah_utils');
        $entry_id = ee()->TMPL->fetch_param('entry_id');
        $market = ee()->TMPL->fetch_param('market');
        if (!$entry_id) {
            return;
        }

        $cta_data = ee('ah_utils:HomeService')->getCtaIconData($entry_id);
        if (!$cta_data) {
            return;
        }

        //setup the vars we're gonna want later
        $this->market_data = ee('ah_utils:MarketsService')->getMarket($market);
        $this->patient_login = $this->market_data['nav_topnav'][3]['link_url'] ?? '';
        $nav_overrides = $this->market_data['nav_overrides'];
        if (!empty($nav_overrides['find_a_doctor'])) {
            $this->find_a_doctor_url = $nav_overrides['find_a_doctor'];
        } else {
            $this->find_a_doctor_url = '/doctors/';
        }

        if (!empty($nav_overrides['locations'])) {
            $this->find_a_location_url = $nav_overrides['locations'];
        } else {
            $this->find_a_location_url = '/locations/';
        }

        if (!empty($nav_overrides['services'])) {
            $this->explore_services_url = $nav_overrides['services'];
        } else {
            $this->explore_services_url = '/services/';
        }

        $cta_data['cta_market'] = $this->market_data['market'];
        $cta_data['button1_url'] = $this->buttonUrl($cta_data['button1_value']);
        $cta_data['button2_url'] = $this->buttonUrl($cta_data['button2_value']);
        $cta_data['button3_url'] = $this->buttonUrl($cta_data['button3_value']);
        $cta_data['button4_url'] = $this->button4Url($cta_data);

        return ee()->TMPL->parse_variables_row(ee()->TMPL->tagdata, $cta_data);
    }

    /**
     * @param $thisval
     * @return string
     */
    protected function buttonUrl($thisval): string
    {
        if ($thisval == 'find_a_doctor') {
            $return = $this->find_a_doctor_url;
        } elseif ($thisval == 'find_a_location') {
            $return = $this->find_a_location_url;
        } elseif ($thisval == 'explore_services') {
            $return = $this->explore_services_url;
        } else {
            $return = $this->patient_login;
        }

        return $return;
    }

    /**
     * @param array $cta_data
     * @return string
     */
    protected function button4Url(array $cta_data): string
    {
        $thisval = $cta_data['button4_value'];
        if ($thisval == 'find_a_doctor') {
            $return = 'doctors';
        } elseif ($thisval == 'find_a_location') {
            $return = 'locations';
        } elseif ($thisval == 'explore_services') {
            $return = 'services';
        } else {
            $return = $this->patient_login;
            $target = "_blank";
        }

        return $return;
    }
}