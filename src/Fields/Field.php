<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Config;
use WordPlate\Acf\Key;

/**
 * This is the abstract field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
abstract class Field
{
    /**
     * The field's config.
     *
     * @var \WordPlate\Acf\Config
     */
    protected $config;

    /**
     * The field's key prefix.
     *
     * @var string
     */
    protected $keyPrefix = 'field';

    /**
     * The field's parent key.
     *
     * @var string
     */
    protected $parentKey;

    /**
     * Create a new field instance.
     *
     * @param string $label
     * @param string $name
     *
     * @return void
     */
    public function __construct(string $label, string $name = null)
    {
        $this->config = new Config([
            'label' => $label,
            'name' => $name ?? sanitize_title($label),
        ]);
    }

    /**
     * Make a new field instance.
     *
     * @param string $label
     * @param string $name
     *
     * @return self
     */
    public static function make(string $label, string $name = null): self
    {
        return new static($label, $name);
    }

    /**
     * Set the field's parent key.
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
     * Return the field config as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $key = sprintf('%s_%s', $this->parentKey, Key::sanitize($this->config->get('name')));

        if (property_exists($this, 'type')) {
            $this->config->set('type', $this->type);
        }

        if ($this->config->has('conditional_logic')) {
            $this->config->set('conditional_logic', array_map(function ($rules) use ($key) {
                return array_map(function ($rule) use ($key) {
                    $rule->setParentKey($key);

                    return $rule->toArray();
                }, $rules);
            }, $this->config->get('conditional_logic')));
        }

        if ($this->config->has('layouts')) {
            $this->config->set('layouts', array_map(function ($layout) use ($key) {
                $layout->setParentKey($key);

                return $layout->toArray();
            }, $this->config->get('layouts')));
        }

        if ($this->config->has('sub_fields')) {
            $this->config->set('sub_fields', array_map(function ($field) use ($key) {
                $field->setParentKey($key);

                return $field->toArray();
            }, $this->config->get('sub_fields')));
        }

        $this->config->set('key', Key::generate($key, $this->keyPrefix));

        return $this->config->all();
    }
}
