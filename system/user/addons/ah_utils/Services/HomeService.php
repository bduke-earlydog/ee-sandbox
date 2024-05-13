<?php

namespace Avenu\AhUtils\Services;
class HomeService extends EntryService
{
    /**
     * @param int $entry_id
     * @return array
     */
    public function getCtaIconData(int $entry_id): array
    {
        $map = [
            'headline' => 'col_id_70',
            'button_color' => 'col_id_31',
            'button1_value' => 'col_id_32',
            'button2_value' => 'col_id_33',
            'button3_value' => 'col_id_34',
            'button4_value' => 'col_id_35'
        ];

        $return = [];
        $grid_data = $this->getGridData(114, $entry_id, $map, $this->getGridFluidFieldId(114, $entry_id));
        if($grid_data) {
            $prototype = [
                'button1_label' => '',
                'button1_target' => '',
                'button2_label' => '',
                'button2_target' => '',
                'button3_label' => '',
                'button4_target' => '',
                'button5_label' => '',
                'button6_target' => '',
            ];

            $return = array_merge($prototype, $grid_data['0']);
            $return['button1_label'] = lang('ah.home.' . $return['button1_value']);
            $return['button2_label'] = lang('ah.home.' . $return['button2_value']);
            $return['button3_label'] = lang('ah.home.' . $return['button3_value']);
            $return['button4_label'] = lang('ah.home.' . $return['button4_value']);
        }

        return $return;
    }

    /**
     * @param string $market
     * @return array
     */
    public function getMarketNotifications(string $market): array
    {
        if (!$market) {
            $market = 'system';
        }

        $return = [];
        $entry_id = $this->getEntryId($market, self::HOME_CHANNEL);
        if ($entry_id) {
            $return = $this->getGridData(215, $entry_id, ['copy' => 'col_id_116', 'type' => 'col_id_115']);
        }

        return $return;
    }
}