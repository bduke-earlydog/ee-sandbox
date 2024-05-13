<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use ExpressionEngine\Service\Addon\Mcp;

class Throttle_whitelist_mcp extends Mcp
{
    protected $addon_name = 'throttle_whitelist';
}
