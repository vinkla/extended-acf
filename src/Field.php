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

use WordPlate\Acf\Attributes\Conditional;
use WordPlate\Acf\Attributes\Key;
use WordPlate\Acf\Config\Repository;

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
     * The config repository.
     *
     * @var \WordPlate\Acf\Config\Repository
     */
    protected $config;

    /**
     * Create a new field instance.
     *
     * @param array $config
     * @param array $required
     *
     * @return void
     */
    public function __construct(array $config, array $required = [])
    {
        $required = array_merge(['label', 'type'], $required);

        $this->config = new Repository($config, $required);
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

        // If the user has set a custom key.
        if ($this->config->has('key')) {
            $key = Key::validate($this->config->get('key'), 'field');

            $this->key = $key;

            return $key;
        }

        // For fields which doesn't require name attribute we use label instead.
        if (in_array($this->getType(), ['accordion', 'message', 'tab'])) {
            $key = $this->config->get('label');
        } else {
            $key = $this->config->get('name');
        }

        $key = sprintf('%s_%s', $this->parentKey, Key::sanitize($key));

        $this->key = $key;

        return $key;
    }

    /**
     * Set the field parent key.
     *
     * @param string $parentKey
     *
     * @return void
     */
    public function setParentKey(string $parentKey): void
    {
        $this->parentKey = $parentKey;
    }

    /**
     * Get the field type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->config->get('type');
    }

    /**
     * Get the conditional logic.
     *
     * @return array
     */
    public function getConditionalLogic(): array
    {
        $conditionals = [];

        foreach ($this->config->get('conditional_logic') as $rules) {
            $conditional = new Conditional($rules, $this->parentKey);

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

        foreach ($this->config->get('layouts') as $layout) {
            $layout->setParentKey($this->getKey());

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

        foreach ($this->config->get('sub_fields') as $field) {
            $field->setParentKey($this->getKey());

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
        $config = [];

        if (!$this->config->has('key')) {
            $config['key'] = Key::generate('field', $this->getKey());
        }

        if ($this->config->has('conditional_logic')) {
            $config['conditional_logic'] = $this->getConditionalLogic();
        }

        if ($this->config->has('layouts')) {
            $config['layouts'] = $this->getLayouts();
        }

        if ($this->config->has('sub_fields')) {
            $config['sub_fields'] = $this->getSubFields();
        }

        return array_merge($this->config->toArray(), $config);
    }
}
