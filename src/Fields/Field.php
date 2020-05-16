<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Config;
use WordPlate\Acf\Key;

abstract class Field
{
    /** @var \WordPlate\Acf\Config */
    protected $config;

    /** @var string */
    protected $keyPrefix = 'field';

    /** @var string */
    protected $parentKey;

    /** @var string */
    protected $type;

    public function __construct(string $label, ?string $name = null)
    {
        $this->config = new Config([
            'label' => $label,
            'name' => $name ?? sanitize_title($label),
        ]);
    }

    /** @return static */
    public static function make(string $label, ?string $name = null): self
    {
        return new static($label, $name);
    }

    public function setParentKey(string $parentKey): void
    {
        $this->parentKey = $parentKey;
    }

    public function toArray(): array
    {
        $key = sprintf('%s_%s', $this->parentKey, Key::sanitize($this->config->get('name')));

        if (!empty($this->type)) {
            $this->config->set('type', $this->type);
        }

        if ($this->config->has('conditional_logic')) {
            $this->config->set('conditional_logic', array_map(function ($rules) {
                return array_map(function ($rule) {
                    $rule->setParentKey($this->parentKey);

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

        if ($this->config->has('collapsed')) {
            foreach ($this->config->get('sub_fields', []) as $field) {
                if ($field['name'] === $this->config->get('collapsed')) {
                    $this->config->set('collapsed', $field['key']);

                    break;
                }
            }
        }

        $this->config->set('key', Key::generate($key, $this->keyPrefix));

        return $this->config->all();
    }
}
