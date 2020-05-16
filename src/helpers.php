<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

use WordPlate\Acf\FieldGroup;

if (!function_exists('field')) {
    /**
     * Shorthand for the_field and the_sub_field functions.
     *
     * @param string $name
     * @param int|\WP_Post|null $post
     *
     * @return mixed
     */
    function field(string $name, $post = null)
    {
        if (!function_exists('get_field')) {
            return;
        }

        if ($post) {
            $value = get_field($name, $post);
        } else {
            $value = get_sub_field($name) ?: get_field($name);
        }

        return empty($value) ? null : $value;
    }
}

if (!function_exists('option')) {
    /**
     * Shorthand for the_field option function.
     *
     * @param string $name
     *
     * @return mixed
     */
    function option(string $name)
    {
        if (!function_exists('get_field')) {
            return;
        }

        $value = get_field($name, 'option');

        return empty($value) ? null : $value;
    }
}

if (!function_exists('register_extended_field_group')) {
    /**
     * Register ACF field group.
     *
     * @param array $config
     *
     * @return void
     */
    function register_extended_field_group(array $config): void
    {
        if (function_exists('register_field_group')) {
            $fieldGroup = new FieldGroup($config);

            register_field_group($fieldGroup->toArray());
        }
    }
}
