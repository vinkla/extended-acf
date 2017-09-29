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

use Illuminate\Support\Str;
use InvalidArgumentException;

/**
 * This is the field class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Field
{
    /**
     * The field key.
     *
     * @var string
     */
    protected $key;

    /**
     * The group instance.
     *
     * @var \WordPlate\Acf\Group
     */
    protected $group;

    /**
     * The settings array.
     *
     * @var array
     */
    protected $settings;

    /**
     * The group keys.
     *
     * @var array
     */
    protected static $keys = [];

    /**
     * Create a new field instance.
     *
     * @param string $type
     * @param array $settings
     * @param array $keys
     *
     * @return void
     */
    public function __construct(string $type, array $settings, array $keys = [])
    {
        $keys = array_merge(['label', 'name'], $keys);

        foreach ($keys as $key) {
            if (!array_key_exists($key, $settings)) {
                throw new InvalidArgumentException("Missing field setting key [$key].");
            }
        }

        $this->settings = array_merge(compact('type'), $settings);
    }

    /**
     * Get the field key.
     *
     * @return string
     */
    public function getKey(): string
    {
        if ($this->key) {
            return $this->key;
        }

        $name = Str::snake($this->getName());

        $key = sprintf('field_%s_%s', $this->parentKey, $name);

        if (in_array($key, self::$keys)) {
            throw new InvalidArgumentException("The field key [$key] is not unique.");
        }

        self::$keys[] = $key;

        $this->key = $key;

        return $key;
    }

    /**
     * Get the field name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->settings['name'];
    }

    /**
     * Get the field type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->settings['type'];
    }

    /**
     * Set the field parent key.
     *
     * @return void
     */
    public function setParentKey(string $parentKey)
    {
        $this->parentKey = $parentKey;
    }

    /**
     * Get the conditional logic.
     *
     * @return array
     */
    public function getConditionalLogic(): array
    {
        $conditionalLogic = [];

        foreach ($this->settings['conditional_logic'] as $rules) {
            $group = [];

            foreach ($rules as $rule) {
                $name = Str::snake($rule['name']);

                $parentKey = str_replace('field_', '', $this->key);

                $field = sprintf('field_%s_%s', $parentKey, $name);

                $rule = [
                    'field' => $field,
                    'operator' => $rule['operator'],
                    'value' => $rule['value'],
                ];

                $group[] = $rule;
            }

            $conditionalLogic[] = $group;
        }

        return $conditionalLogic;
    }

    /**
     * Get the fields by key.
     *
     * @return array
     */
    public function getFields(string $key)
    {
        $fields = [];

        foreach ($this->settings[$key] as $field) {
            $key = str_replace('field_', '', $this->getKey());

            $field->setParentKey($key);

            $fields[] = $field->toArray();
        }

        return $fields;
    }

    /**
     * Return the field as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $settings = [
            'key' => $this->getKey(),
        ];

        if (isset($this->settings['conditional_logic'])) {
            $settings['conditional_logic'] = $this->getConditionalLogic();
        }

        if (isset($this->settings['sub_fields']) && is_array($this->settings['sub_fields'])) {
            $settings['sub_fields'] = $this->getFields('sub_fields');
        }

        if (isset($this->settings['layouts']) && is_array($this->settings['layouts'])) {
            $settings['layouts'] = $this->getFields('layouts');
        }

        return array_merge($this->settings, $settings);
    }
}
