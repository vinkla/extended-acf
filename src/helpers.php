<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

use Extended\ACF\Key;

if (!function_exists('register_extended_field_group')) {
    /**
     * @see https://www.advancedcustomfields.com/resources/register-fields-via-php/#group-settings
     * @throws \InvalidArgumentException
     */
    function register_extended_field_group(array $settings): array
    {
        $requiredKeys = ['title', 'fields', 'location'];

        foreach ($requiredKeys as $key) {
            if (array_key_exists($key, $settings) === false) {
                throw new InvalidArgumentException("Missing field group setting [$key].");
            }
        }

        $key = Key::sanitize($settings['key'] ?? $settings['title']);

        $settings['style'] ??= 'seamless';

        $settings['fields'] = array_map(fn ($field) => $field->get($key), $settings['fields']);

        $settings['location'] = array_map(fn ($location) => $location->get(), $settings['location']);

        $settings['key'] = Key::generate($key, 'group');

        register_field_group($settings);

        return $settings;
    }
}
