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

use InvalidArgumentException;

if (!function_exists('acf_checkbox')) {
    /**
     * Get an acf checkbox field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_checkbox(array $settings): array
    {
        return acf_field('checkbox', $settings);
    }
}

if (!function_exists('acf_email')) {
    /**
     * Get an acf email field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_email(array $settings): array
    {
        return acf_field('email', $settings);
    }
}

if (!function_exists('acf_field')) {
    /**
     * Get an acf field settings array.
     *
     * @param string $type
     * @param array $settings
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    function acf_field(string $type, array $settings): array
    {
        $keys = ['name', 'label'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $settings)) {
                throw new InvalidArgumentException("Missing field setting key [$key].");
            }
        }

        return array_merge(compact('type'), $settings);
    }
}

if (!function_exists('acf_file')) {
    /**
     * Get an acf file field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_file(array $settings): array
    {
        return acf_field('file', $settings);
    }
}

if (!function_exists('acf_gallery')) {
    /**
     * Get an acf gallery field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_gallery(array $settings): array
    {
        return acf_field('gallery', $settings);
    }
}

if (!function_exists('acf_number')) {
    /**
     * Get an acf number field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_number(array $settings): array
    {
        return acf_field('number', $settings);
    }
}

if (!function_exists('acf_image')) {
    /**
     * Get an acf image field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_image(array $settings): array
    {
        return acf_field('image', $settings);
    }
}

if (!function_exists('acf_password')) {
    /**
     * Get an acf password field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_password(array $settings): array
    {
        return acf_field('password', $settings);
    }
}

if (!function_exists('acf_radio')) {
    /**
     * Get an acf radio field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_radio(array $settings): array
    {
        return acf_field('radio', $settings);
    }
}

if (!function_exists('acf_select')) {
    /**
     * Get an acf select field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_select(array $settings): array
    {
        return acf_field('select', $settings);
    }
}

if (!function_exists('acf_text')) {
    /**
     * Get an acf text field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_text(array $settings): array
    {
        return acf_field('text', $settings);
    }
}

if (!function_exists('acf_textarea')) {
    /**
     * Get an acf textarea field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_textarea(array $settings): array
    {
        return acf_field('textarea', $settings);
    }
}

if (!function_exists('acf_true_false')) {
    /**
     * Get an acf true_false field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_true_false(array $settings): array
    {
        return acf_field('true_false', $settings);
    }
}

if (!function_exists('acf_url')) {
    /**
     * Get an acf url field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_url(array $settings): array
    {
        return acf_field('url', $settings);
    }
}

if (!function_exists('acf_wysiwyg')) {
    /**
     * Get an acf wysiwyg field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_wysiwyg(array $settings): array
    {
        return acf_field('wysiwyg', $settings);
    }
}

if (!function_exists('acf_oembed')) {
    /**
     * Get an acf oembed field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_oembed(array $settings): array
    {
        return acf_field('oembed', $settings);
    }
}
