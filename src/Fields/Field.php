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
        dump($this->toArray(), ...$args);

        return $this;
    }

    public function dd(...$args): never
    {
        dd($this->toArray(), ...$args);
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
        // Export into a new array to keep the builder state on $this->settings
        // intact, so the same field instance can be nested under multiple
        // parents without being consumed by the first export.
        $settings = $this->settings;

        $key = $settings['key'] ?? $parentKey . '_' . Key::sanitize($settings['name']);

        if (isset($this->type)) {
            $settings['type'] = $this->type;
        }

        if (isset($settings['conditional_logic'])) {
            $settings['conditional_logic'] = array_map(
                fn(ConditionalLogic $rules) => $rules->toArray($parentKey),
                $settings['conditional_logic'],
            );
        }

        if (isset($settings['layouts'])) {
            $settings['layouts'] = array_map(
                fn(Layout $layout) => $layout->toArray($key),
                $settings['layouts'],
            );
        }

        if (isset($settings['sub_fields'])) {
            $settings['sub_fields'] = array_map(
                fn(Field $field) => $field->toArray($key),
                $settings['sub_fields'],
            );
        }

        if (isset($settings['collapsed'], $settings['sub_fields'])) {
            foreach ($settings['sub_fields'] as $field) {
                if ($field['name'] === $settings['collapsed']) {
                    $settings['collapsed'] = $field['key'];
                    break;
                }
            }
        }

        $settings['key'] ??= Key::generate($key, $this->keyPrefix);

        return $settings;
    }
}
