<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Live_url_mcp
{
    public function index()
    {
        return ee('live_url:SettingsService')->form();
    }

    public function save()
    {
        if (empty($_POST)) {
            show_error(lang('unauthorized_access'));
        }
        ee('live_url:SettingsService')->save();
        return ee()->redirect(ee()->functions->redirect(ee('CP/URL', 'addons/settings/live_url')));
    }
}
