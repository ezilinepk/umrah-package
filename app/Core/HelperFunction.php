<?php

namespace App\Core;

class HelperFunction
{
    /**
     * @return Uid
     */
    public static function _uid()
    {
        return md5(date('Y-m-d') . microtime() . rand());
    }

}
