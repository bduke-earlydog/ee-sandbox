<?php

namespace Avenu\AhUtils\Services;

class MarketsService extends EntryService
{
    /**
     * @var array
     */
    protected array $markets = [];

    /**
     * @param string $market
     * @return array
     */
    public function getMarket(string $market): array
    {
        if (isset($this->markets[$market])) {
            return $this->markets[$market];
        }

        $data = $this->compile($market);
        if ($data) {
            $this->markets = $data + $this->markets;
            return $this->markets[$market];
        }

        return $this->getMarket('system');
    }

    /**
     * @return array
     */
    public function getMarkets(): array
    {
        return $this->markets;
    }

    /**
     * @param string|null $url_title
     * @return array
     */
    public function compile(?string $url_title = null): array
    {
        $market_data = ee('Model')
            ->get('ChannelEntry')
            ->filter('channel_id', self::MARKET_CHANNEL);

        if (!is_null($url_title)) {
            $market_data->filter('url_title', $url_title);
        }

        $data = [];
        if ($market_data->count() >= 1) {
            $count = 1;
            foreach ($market_data->all() as $entry) {

                $market = [
                    'total_results' => $market_data->count(),
                    'count' => $count,
                    'market_entry_id' => $entry->entry_id,
                    'market_name' => $entry->title,
                    'market_url' => ($entry->url_title != 'system' ? $entry->url_title : ''),
                    'market' => $entry->url_title,
                    'nav_logo_header' => $this->getImageUrl($entry->field_id_190),
                    'nav_topnav' => $this->getTopNav($entry->entry_id),
                    'nav_logo_footer' => $this->getImageUrl($entry->field_id_194),
                    'nav_address_1' => $entry->field_id_209,
                    'nav_address_2' => $entry->field_id_210,
                    'nav_city' => $entry->field_id_202,
                    'nav_state' => $entry->field_id_195,
                    'nav_zip_code' => $entry->field_id_207,
                    'nav_phone' => $entry->field_id_200,
                    'nav_facebook_url' => $entry->field_id_197,
                    'nav_twitter_url' => $entry->field_id_193,
                    'nav_linkedin_url' => $entry->field_id_199,
                    'nav_instagram_url' => $entry->field_id_198,
                    'nav_market_active' => $entry->field_id_191,
                    'nav_market_region' => $entry->field_id_188,
                    'nav_market_image' => $this->getImageUrl($entry->field_id_186),
                    'nav_market_link' => $entry->field_id_211,
                    'nav_quick_links' => $this->getQuickLinks($entry->entry_id),
                    'nav_helpful_resources' => $this->getHelpfulResources($entry->entry_id),
                    'nav_overrides' => $this->getOverrides($entry->entry_id),
                ];

                if ($market['nav_overrides']) { //compound this data for ease of use in templates
                    foreach ($market['nav_overrides'] as $key => $override) {
                        $market['nav_override_' . $key] = $override;
                    }
                }

                $data[$entry->url_title] = $market;
                $count++;
            }
        }

        return $data;
    }

    /**
     * @param int $entry_id
     * @return array
     */
    protected function getTopNav(int $entry_id): array
    {
        $data = $this->getGridData(208, $entry_id, ['link_label' => 'col_id_110', 'link_url' => 'col_id_111']);
        foreach ($data as $key => $value) {
            $data[$key]['link_label'] = lang('ah.markets.' . $value['link_label']);
        }

        return $data;
    }

    /**
     * @param int $entry_id
     * @return array
     */
    protected function getQuickLinks(int $entry_id): array
    {
        return $this->getGridData(192, $entry_id, ['link_label' => 'col_id_102', 'link_url' => 'col_id_103']);
    }

    /**
     * @param int $entry_id
     * @return array
     */
    protected function getHelpfulResources(int $entry_id): array
    {
        return $this->getGridData(201, $entry_id, ['link_label' => 'col_id_104', 'link_url' => 'col_id_105']);
    }

    /**
     * @param int $entry_id
     * @return array
     */
    protected function getOverrides(int $entry_id): array
    {
        $return = [];
        $data = $this->getGridData(206, $entry_id, ['link_label' => 'col_id_108', 'link_url' => 'col_id_109']);
        foreach ($data as $key => $value) {
            $return[$value['link_label']] = $value['link_url'];
        }

        return $return;
    }
}