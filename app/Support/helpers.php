<?php
use App\Models;
use Carbon\Carbon;


if (!function_exists('mb_strim')) {
    function mb_strim($str, $start = 0, $length = 50, $marker = '...', $encoding = 'UTF-8')
    {
        $result = mb_substr($str, $start, $length, $encoding);

        if (mb_strlen($str, $encoding) > mb_strlen($result, $encoding)) {
            $result .= $marker;
        }

        return $result;
    }
}

if (!function_exists('javascript_encode')) {
    function javascript_encode($str)
    {
        $str = str_replace(array("\r\n", "\r", "\n"), '', $str);
        $str = str_replace(array("'"), "\'", $str);

        return $str;
    }
}


if (!function_exists('format_price')) {
    function format_price($price, $forAdmin = false)
    {
        if ($forAdmin)
            return number_format($price);

        return number_format($price) . '円';
    }
}


if (!function_exists('format_date')) {
    function format_date($date)
    {
        if ($date) {
            return Carbon::parse($date)->format('Y-m-d');
        }

        return '';
    }
}
