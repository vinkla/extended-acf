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

namespace WordPlate\Acf;

use InvalidArgumentException;

/**
 * This is the acf class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Acf
{
    /**
     * Get an acf field settings array.
     *
     * @param string $type
     * @param array $settings
     * @param array $keys
     *
     * @throws \InvalidArgumentException
     *
     * @return array
     */
    public static function field(string $type, array $settings, array $keys = []): array
    {
        $keys = array_merge(['name', 'label'], $keys);

        foreach ($keys as $key) {
            if (!array_key_exists($key, $settings)) {
                throw new InvalidArgumentException("Missing field setting key [$key].");
            }
        }

        return array_merge(compact('type'), $settings);
    }

    /**
     * Register an acf field group.
     *
     * @param array $settings
     *
     * @return void|null
     */
    public static function group(array $settings)
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        $keys = ['title', 'fields'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $settings)) {
                throw new InvalidArgumentException("Missing group setting key [$key].");
            }
        }

        $group = new Group($settings);

        acf_add_local_field_group($group->toArray());
    }
}
