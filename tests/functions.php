<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

if (!function_exists('register_field_group')) {
    function register_field_group()
    {
        //
    }
}

if (!function_exists('get_field')) {
    function get_field($value, $post = null)
    {
        if ($post && $value !== 'option') {
            return $value;
        }
    }
}

if (!function_exists('get_sub_field')) {
    function get_sub_field()
    {
        //
    }
}
