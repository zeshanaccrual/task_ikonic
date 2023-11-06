<?php

use Illuminate\Support\Facades\Crypt;

if (!function_exists('encryptParams')) {
    function encryptParams($params): array|string
    {
        if (is_array($params)) {
            $data = [];
            foreach ($params as $item) {
                $data[] = Crypt::encryptString($item);
            }
            return $data;
        }
        return Crypt::encryptString($params);
    }
}

if (!function_exists('decryptParams')) {
    function decryptParams($params): array|string
    {
        try {

            if (is_array($params)) {
                $data = [];
                foreach ($params as $item) {
                    $data[] = Crypt::decryptString($item);
                }
                return $data;
            }
            return Crypt::decryptString($params);
        } catch (Exception $e) {
            return $params;
        }
    }
}
if (!function_exists('get_months')) {
    function get_months($value)
    {
        $months = [
            1 => 'Jan',
            2 => 'Feb',
            3 => 'Mar',
            4 => 'Apr',
            5 => 'May',
            6 => 'Jun',
            7 => 'Jul',
            8 => 'Aug',
            9 => 'Sept',
            10 => 'Oct',
            11 => 'Nov',
            12 => 'December'
        ];
    }
}