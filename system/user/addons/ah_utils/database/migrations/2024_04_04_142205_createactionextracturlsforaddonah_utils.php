<?php

use ExpressionEngine\Service\Migration\Migration;

class CreateactionextracturlsforaddonahUtils extends Migration
{
    /**
     * Execute the migration
     * @return void
     */
    public function up()
    {
        ee('Model')->make('Action', [
            'class' => 'Ah_utils',
            'method' => 'ExtractUrls',
            'csrf_exempt' => false,
        ])->save();
    }

    /**
     * Rollback the migration
     * @return void
     */
    public function down()
    {
        ee('Model')->get('Action')
            ->filter('class', 'Ah_utils')
            ->filter('method', 'ExtractUrls')
            ->delete();
    }
}
