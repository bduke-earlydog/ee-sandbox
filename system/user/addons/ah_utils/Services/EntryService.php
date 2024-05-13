<?php

namespace Avenu\AhUtils\Services;

use ExpressionEngine\Model\File\File as FileModel;
use CI_DB_result ;

class EntryService
{
    const MARKET_CHANNEL = 14;
    const HOME_CHANNEL = 12;

    /**
     * @param int $field_id
     * @param int $entry_id
     * @param array $fields
     * @param int $fluid_field_data_id
     * @return array
     */
    protected function getGridData(int $field_id, int $entry_id, array $fields, int $fluid_field_data_id = 0): array
    {
        $return = [];
        ee()->load->model('grid_model');
        $grid_data = ee()->grid_model->get_entry($entry_id, $field_id, 'channel', $fluid_field_data_id);
        if ($grid_data) {
            foreach ($grid_data as $row) {
                $var = [];
                foreach ($fields as $key => $value) {
                    if (isset($row[$value])) {
                        $var[$key] = $row[$value];
                    }
                }

                if (count($var) >= 1) {
                    $return[] = $var;
                }
            }
        }

        return $return;
    }

    /**
     * This may not tbe the best way to do this but it does work
     * @param int $field_id
     * @param int $entry_id
     * @return int
     */
    protected function getGridFluidFieldId(int $field_id, int $entry_id): int
    {
        $return = 0;
        $table = 'channel_grid_field_' . $field_id;
        if(ee()->db->table_exists($table)){
            $where = [
                'entry_id' => $entry_id
            ];

            $query = ee()->db->select('fluid_field_data_id')->from($table)
                ->where($where)
                ->limit(1)
                ->get();

            if($query instanceof CI_DB_result && $query->num_rows() > 0) {
                $return = $query->row('fluid_field_data_id');
            }
        }

        return $return;
    }

    /**
     * @param string|null $tag
     * @return string
     */
    protected function getImageUrl(?string $tag): string
    {
        $url = '';

        if(!is_null($tag)) {
            $file_id = (int)filter_var($tag, FILTER_SANITIZE_NUMBER_INT);
            if ($file_id) {
                $file = ee('Model')
                    ->get('File')
                    ->filter('file_id', $file_id)
                    ->first();

                if ($file instanceof FileModel) {
                    if ($file->isImage()) {
                        $url = $file->getAbsoluteURL();
                        if(!$url) {
                            $url = '';
                        }
                    }
                }
            }
        }

        return $url;
    }

    /**
     * @param string $url_title
     * @param int $channel_id
     * @return int|null
     */
    protected function getEntryId(string $url_title, int $channel_id): ?int
    {
        $return = null;
        $where = [
            'url_title' => $url_title,
            'channel_id' => $channel_id,
        ];
        $data = ee()->db->select('entry_id')->from('channel_titles')->where($where)->get();
        if($data instanceof CI_DB_result && $data->num_rows() > 0) {
            $return = $data->row('entry_id');
        }

        return $return;
    }
}