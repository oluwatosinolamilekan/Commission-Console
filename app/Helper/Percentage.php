<?php

namespace App\Helper;

class Percentage
{
    public static function run($amount, $percent)
    {
       return ($amount * $percent);
    }
}
