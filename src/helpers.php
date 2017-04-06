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
