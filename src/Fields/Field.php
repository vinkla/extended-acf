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
    public function get(string|null $parentKey = null): array
    {
        $key = sprintf('%s_%s', $parentKey, Key::sanitize($this->settings['name']));

        if ($this->type !== null) {
            $this->settings['type'] = $this->type;
        }

        if (isset($this->settings['conditional_logic'])) {
            $this->settings['conditional_logic'] = array_map(function ($rules) use ($parentKey) {
                return array_map(fn ($rule) => $rule->get($parentKey), $rules);
            }, $this->settings['conditional_logic']);
        }

        if (isset($this->settings['layouts'])) {
            $this->settings['layouts'] = array_map(fn ($layout) => $layout->get($key), $this->settings['layouts']);
        }

        if (isset($this->settings['sub_fields'])) {
            $this->settings['sub_fields'] = array_map(fn ($field) => $field->get($key), $this->settings['sub_fields']);
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
