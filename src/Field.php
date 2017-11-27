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
     * The field parent key.
     *
     * @var string
     */
    protected $parentKey;

    /**
     * The settings array.
     *
     * @var array
     */
    protected $settings;

    /**
     * The field keys.
     *
     * @var array
     */
    protected static $keys = [];

    /**
     * Create a new field instance.
     *
     * @param array $settings
     * @param array $keys
     *
     * @return void
     */
    public function __construct(array $settings, array $keys = [])
    {
        $keys = array_merge(['label', 'type'], $keys);

        foreach ($keys as $key) {
            if (!array_key_exists($key, $settings)) {
                throw new InvalidArgumentException("Missing field setting key [$key].");
            }
        }

        $this->settings = $settings;
    }

    /**
     * Get the field key.
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public function getKey(): string
    {
        if ($this->key) {
            return $this->key;
        }

        $name = str_replace('-', '_', sanitize_title($this->settings['name']));

        $key = sprintf('field_%s_%s', $this->parentKey, $name);

        if (in_array($key, self::$keys)) {
            throw new InvalidArgumentException("The field key [$key] is not unique.");
        }

        self::$keys[] = $key;

        $this->key = $key;

        return $key;
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
        $conditionals = [];

        foreach ($this->settings['conditional_logic'] as $rules) {
            $conditional = new Conditional($rules, $this->getKey());

            $conditionals[] = $conditional->toArray();
        }

        return $conditionals;
    }

    /**
     * Get the flexible content layouts.
     *
     * @return array
     */
    public function getLayouts(): array
    {
        $layouts = [];

        foreach ($this->settings['layouts'] as $layout) {
            $key = str_replace('field_', '', $this->getKey());

            $layout->setParentKey($key);

            $layouts[] = $layout->toArray();
        }

        return $layouts;
    }

    /**
     * Get the sub fields.
     *
     * @return array
     */
    public function getSubFields(): array
    {
        $fields = [];

        foreach ($this->settings['sub_fields'] as $field) {
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

        if (isset($this->settings['layouts']) && is_array($this->settings['layouts'])) {
            $settings['layouts'] = $this->getLayouts();
        }

        if (isset($this->settings['sub_fields']) && is_array($this->settings['sub_fields'])) {
            $settings['sub_fields'] = $this->getSubFields();
        }

        return array_merge($this->settings, $settings);
    }
}
