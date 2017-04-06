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
