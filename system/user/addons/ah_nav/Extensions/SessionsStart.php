<?php

namespace PacketTide\AhNav\Extensions;

use ExpressionEngine\Service\Addon\Controllers\Extension\AbstractRoute;

class SessionsStart extends AbstractRoute
{
    public function process($obj)
    {
        // Get the structure tree items with no parent and where structure_url_title is not null
        $topLevelResults = ee()->db->select('structure_url_title')
            ->from('structure')
            ->where('parent_id', 0)
            ->where('structure_url_title IS NOT NULL')
            ->get();

        // If there are no results return nothing
        if ($topLevelResults->num_rows === 0) {
            return null;
        }

        // Get the structure_url_title column from the results
        $topLevelItems = $topLevelResults->result_array();
        $topLevelItems = array_column($topLevelItems, 'structure_url_title');

        // If the current URL segment is not in the top level items return nothing
        if(!in_array(ee()->uri->segment(1), $topLevelItems)) {
            $dynamicStartFrom = '';
            $sideNavDynamicStartFrom = '/' . ee()->uri->segment(1);
        } else {
            $dynamicStartFrom = '/' . ee()->uri->segment(1);
            $sideNavDynamicStartFrom = '/' . ee()->uri->segment(1) . '/' . ee()->uri->segment(2);
        }

        ee()->config->_global_vars['ah_nav:dynamic_start_from'] = $dynamicStartFrom;
        ee()->config->_global_vars['ah-nav:dynamic_start_from'] = $dynamicStartFrom;
        ee()->config->_global_vars['ah-nav:side_nav_dynamic_start_from'] = $sideNavDynamicStartFrom;
    }
}
