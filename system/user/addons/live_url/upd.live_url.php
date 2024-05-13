<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use ExpressionEngine\Service\Addon\Installer;

class Live_url_upd extends Installer
{
    public $has_cp_backend = 'n';
    public $has_publish_fields = 'n';

    public function install()
    {
        parent::install();
        $this->installSettingsTable();
        return true;
    }

    public function update($current = '')
    {
        // Runs migrations
        parent::update($current);

        if (version_compare($current, '1.1.0', '<')) {
            $this->installSettingsTable();
        }
        return true;
    }

    public function uninstall()
    {
        parent::uninstall();

        return true;
    }

    private function installSettingsTable()
    {
        // Create module settings table
        ee()->load->dbforge();
        // Set up stats table
        if (!ee()->db->table_exists('live_url_settings')) {
            ee()->dbforge->add_field(
                [
                    'setting_id'           => [
                        'type'              => 'int',
                        'constraint'        => 6,
                        'unsigned'          => true,
                        'auto_increment'    => true,
                    ],
                    'site_id'           => [
                        'type'              => 'int',
                        'constraint'        => 6,
                        'unsigned'          => true,
                    ],
                    'channel_id'               => [
                        'type'              => 'int',
                        'constraint'        => 6,
                        'unsigned'          => true,
                    ],
                    'url'              => [
                        'type' => 'VARCHAR',
                        'constraint' => 255,
                    ],
                ]
            );

            ee()->dbforge->add_key('setting_id', true);
            ee()->dbforge->create_table('live_url_settings');
        }
    }
}
