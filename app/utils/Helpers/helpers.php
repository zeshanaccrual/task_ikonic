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
if (!function_exists('is_admin')) {
    function is_admin()
    {
        if (auth()->user()->is_admin == true) {
            // return $user = 'is_admin';
            return true;
        } else {
            // return $user = 'is_user';
            return false;
        }
    }
}
