<?php

if (!function_exists('set_active')) {
    function set_active($uri, $output = "active")
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}

if (!function_exists('check_route')) {
    function check_route($uri)
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            if (Route::is($uri)) {
                return true;
            } else {
                return false;
            }
        }
    }
}
