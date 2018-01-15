<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

if (!function_exists('acf_add_local_field_group')) {
    function acf_add_local_field_group()
    {
        //
    }
}

if (!function_exists('acf_add_options_page')) {
    function acf_add_options_page()
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

        return;
    }
}

if (!function_exists('get_sub_field')) {
    function get_sub_field()
    {
        //
    }
}
