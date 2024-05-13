<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use ExpressionEngine\Service\Addon\Module;

class Throttle_whitelist extends Module
{
    protected $addon_name = 'throttle_whitelist';
}
