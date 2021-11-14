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

use WordPlate\Acf\Key;

abstract class Field
{
    protected array $settings;
    protected string $keyPrefix = 'field';
    protected string|null $parentKey = null;
    protected string|null $type = null;

    public function __construct(string $label, string|null $name = null)
    {
        $this->settings = [
            'label' => $label,
            'name' => $name ?? Key::sanitize($label),
        ];
    }

    public static function make(string $label, string|null $name = null): static
    {
        return new static($label, $name);
    }

    /** @internal */
    public function setParentKey(string $parentKey): void
    {
        $this->parentKey = $parentKey;
    }

    /** @internal */
    public function toArray(): array
    {
        $key = sprintf('%s_%s', $this->parentKey, Key::sanitize($this->settings['name']));

        if (empty($this->type) === false) {
            $this->settings['type'] = $this->type;
        }

        if (isset($this->settings['conditional_logic'])) {
            $this->settings['conditional_logic'] = array_map(function ($rules) {
                return array_map(function ($rule) {
                    $rule->setParentKey($this->parentKey);

                    // TODO: Rethink parent keys.

                    return $rule->toArray();
                }, $rules);
            }, $this->settings['conditional_logic']);
        }

        if (isset($this->settings['layouts'])) {
            $this->settings['layouts'] = array_map(function ($layout) use ($key) {
                $layout->setParentKey($key);

                return $layout->toArray();
            }, $this->settings['layouts']);
        }

        if (isset($this->settings['sub_fields'])) {
            $this->settings['sub_fields'] = array_map(function ($field) use ($key) {
                $field->setParentKey($key);

                return $field->toArray();
            }, $this->settings['sub_fields']);
        }

        if (isset($this->settings['collapsed'], $this->settings['sub_fields'])) {
            foreach ($this->settings['sub_fields'] as $field) {
                if ($field['name'] === $this->settings['collapsed']) {
                    $this->settings['collapsed'] = $field['key'];
                    break;
                }
            }
        }

        $this->settings['key'] = Key::generate($key, $this->keyPrefix);

        return $this->settings;
    }
}
