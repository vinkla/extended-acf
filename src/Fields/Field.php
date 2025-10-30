<?php

/**
 * Copyright (c) Vincent Klaiber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Fields;

use Extended\ACF\ConditionalLogic;
use Extended\ACF\Key;
use Extended\ACF\Macroable;
use InvalidArgumentException;

abstract class Field
{
    use Macroable;

    public protected(set) array $settings;
    protected string $keyPrefix = 'field';

    public function __construct(string $label, ?string $name = null)
    {
        $this->settings = [
            'label' => $label,
            'name' => $name ?? Key::sanitize($label),
        ];
    }

    public static function make(string $label, ?string $name = null): static
    {
        return new static($label, $name);
    }

    /** @throws \InvalidArgumentException */
    public function withSettings(array $settings): static
    {
        $invalidKeys = [
            'collapsed',
            'conditional_logic',
            'key',
            'label',
            'layouts',
            'name',
            'sub_fields',
            'type',
        ];

        foreach ($invalidKeys as $key) {
            if (array_key_exists($key, $settings)) {
                throw new InvalidArgumentException("Invalid settings key [$key].");
            }
        }

        $this->settings = array_merge($this->settings, $settings);

        return $this;
    }

    public function dump(...$args): static
    {
        $settings = $this->cloneRecursively()->toArray();

        dump($settings, ...$args);

        return $this;
    }

    public function dd(...$args): never
    {
        dd($this->toArray(), ...$args);
    }

    /** @internal */
    private function cloneRecursively(): static
    {
        $clone = clone $this;

        if (isset($this->settings['sub_fields'])) {
            $clone->settings['sub_fields'] = array_map(
                fn(Field $field) => $field->cloneRecursively(),
                $this->settings['sub_fields'],
            );
        }

        return $clone;
    }

    /**
     * Avoid using custom field keys unless you thoroughly understand them. The
     * field keys are automatically generated when you use the
     * `register_extended_field_group` function.
     * @throws \InvalidArgumentException
     */
    public function key(string $key): static
    {
        if (!str_starts_with($key, $this->keyPrefix . '_')) {
            throw new InvalidArgumentException(
                sprintf('The key should have the prefix [%s_].', $this->keyPrefix),
            );
        }

        if (Key::has($key)) {
            throw new InvalidArgumentException("The key [$key] is not unique.");
        }

        $this->settings['key'] = $key;

        Key::set($key, $key);

        return $this;
    }

    /** @internal */
    public function toArray(?string $parentKey = null): array
    {
        $key
            = $this->settings['key']
            ?? $parentKey . '_' . Key::sanitize($this->settings['name']);

        if (isset($this->type)) {
            $this->settings['type'] = $this->type;
        }

        if (isset($this->settings['conditional_logic'])) {
            $this->settings['conditional_logic'] = array_map(
                fn(ConditionalLogic $rules) => $rules->toArray($parentKey),
                $this->settings['conditional_logic'],
            );
        }

        if (isset($this->settings['layouts'])) {
            $this->settings['layouts'] = array_map(
                fn(Layout $layout) => $layout->toArray($key),
                $this->settings['layouts'],
            );
        }

        if (isset($this->settings['sub_fields'])) {
            $this->settings['sub_fields'] = array_map(
                fn(Field $field) => $field->toArray($key),
                $this->settings['sub_fields'],
            );
        }

        if (isset($this->settings['collapsed'], $this->settings['sub_fields'])) {
            foreach ($this->settings['sub_fields'] as $field) {
                if ($field['name'] === $this->settings['collapsed']) {
                    $this->settings['collapsed'] = $field['key'];
                    break;
                }
            }
        }

        $this->settings['key'] ??= Key::generate($key, $this->keyPrefix);

        return $this->settings;
    }
}
