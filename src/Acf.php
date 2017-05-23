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
     * @throws \InvalidArgumentException
     *
     * @return void|null
     */
    public static function group(array $settings)
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        $keys = ['key', 'title', 'fields'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $settings)) {
                throw new InvalidArgumentException("Missing field group setting key [$key].");
            }
        }

        if (!starts_with($settings['key'], 'group_')) {
            throw new InvalidArgumentException('Group setting [key] must begin with \'group_\'.');
        }

        $settings['key'] = snake_case($settings['key']);

        $keys = [];

        $group = str_replace('group_', '', $settings['key']);

        foreach ($settings['fields'] as $i => $field) {
            $key = sprintf('field_%s_%s', $group, snake_case($field['name']));

            if (in_array($key, $keys)) {
                throw new InvalidArgumentException("Field setting key [$key] is duplicated.");
            }

            array_push($keys, $key);

            $settings['fields'][$i]['key'] = $key;

            if (array_has($field, 'conditional_logic') && is_array($field['conditional_logic'])) {
                $logic = [];

                foreach ($field['conditional_logic'] as $rules) {
                    $arr = [];

                    foreach ($rules as $rule) {
                        array_push($arr, [
                            'field' => sprintf('field_%s_%s', $group, array_get($rule, 'field')),
                            'operator' => array_get($rule, 'operator'),
                            'value' => array_get($rule, 'value'),
                        ]);
                    }

                    array_push($settings['fields'][$i]['conditional_logic'], $arr);
                }

                $settings['fields'][$i]['conditional_logic'] = $logic;
            }
        }

        if (!array_key_exists('hide_on_screen', $settings)) {
            array_push($settings, 'hide_on_screen', acf_hide_on_screen([
                'author',
                'categories',
                'comments',
                'custom_fields',
                'discussion',
                'excerpt',
                'format',
                'page_attributes',
                'revisions',
                'send-trackbacks',
                'slug',
                'tags',
            ]));
        }

        acf_add_local_field_group($settings);
    }
}
