<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

use ExpressionEngine\Service\Addon\Extension;

class Throttle_whitelist_ext extends Extension
{
    protected $addon_name = 'throttle_whitelist';
}
