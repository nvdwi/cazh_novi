<?php

namespace App\Utilities;

class Numbers
{
    public static function random($length)
    {
        return substr(str_shuffle('0123456789'), 0, $length);
    }

    public static function formatCurrency($number = 0, $unit = 'Rp', $isSuffixUnit = false, $decimal = 0)
    {
        if ($isSuffixUnit) {
            return number_format($number, $decimal, ',', '.').' '.$unit;
        } else {
            return $unit.''.number_format($number, $decimal, ',', '.');
        }
    }
}
