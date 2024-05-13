<?php

use ExpressionEngine\Service\Migration\Migration;

class CreateExtHookSessionsStartForAddonAhNav extends Migration
{
    /**
     * Execute the migration
     * @return void
     */
    public function up()
    {
        $addon = ee('Addon')->get('ah_nav');

        $ext = [
            'class' => $addon->getExtensionClass(),
            'method' => 'sessions_start',
            'hook' => 'sessions_start',
            'settings' => serialize([]),
            'priority' => 11,
            'version' => $addon->getVersion(),
            'enabled' => 'y'
        ];

        // If we didnt find a matching Extension, lets just insert it
        ee('Model')->make('Extension', $ext)->save();
    }

    /**
     * Rollback the migration
     * @return void
     */
    public function down()
    {
        $addon = ee('Addon')->get('ah_nav');

        ee('Model')->get('Extension')
            ->filter('class', $addon->getExtensionClass())
            ->delete();
    }
}
