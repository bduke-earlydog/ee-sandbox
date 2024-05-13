<?php
namespace Avenu\AhUtils\Services;
class UrlService
{
    /**
     * @param string $table
     * @param int $id
     * @param array $urls
     * @return array
     */
    public function searchTable(string $table, int $id, array $urls): array
    {
        $return = [];
        $data = ee()->db->select()->from($table)->get();
        if($data->num_rows >= 1) {
            foreach($data->result_array() AS $key => $value) {
                foreach($value AS $k => $v) {
                    foreach($urls AS $url) {
                        if(str_contains($v, $url)) {
                            $return[$value['entry_id']] = $value['entry_id'];
                            //break;
                        }
                    }
                }
            }
        }

        return $return;
    }

    /**
     * @return array
     */
    public function getChannelTables(): array
    {
        $tables = ee()->db->list_tables();
        $channel_data = [];
        foreach($tables AS $table) {
            if(str_starts_with($table, 'exp_channel_data_field_')) {
                $key = str_replace('exp_channel_data_field_', '', $table);
                $channel_data[$key] = $table;
            }
        }

        return $channel_data;
    }

    /**
     * @return array
     */
    public function getGridTables(): array
    {
        $tables = ee()->db->list_tables();
        $grid_data = [];
        foreach($tables AS $table) {
            if(str_starts_with($table, 'exp_channel_grid_field_')) {
                $grid_data[] = $table;
            }
        }

        return $grid_data;
    }
}