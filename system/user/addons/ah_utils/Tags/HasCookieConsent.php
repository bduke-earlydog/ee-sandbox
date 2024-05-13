<?php

namespace Avenu\AhUtils\Tags;

use ExpressionEngine\Service\Addon\Controllers\Tag\AbstractRoute;

class HasCookieConsent extends AbstractRoute
{
    public function process()
    {
        if (!isset($_COOKIE['ah_consent'])) {
            return ee()->TMPL->tagdata;
        }
    }

}