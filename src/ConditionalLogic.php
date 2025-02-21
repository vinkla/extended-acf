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

namespace Extended\ACF;

use InvalidArgumentException;

class ConditionalLogic
{
    public array $rules = [];

    public function __construct(
        string $name,
        string $operator,
        mixed $value = null,
        ?string $group = null,
        ?string $key = null,
    ) {
        $this->rules[] = [
            'name' => $name,
            'operator' => $operator,
            'value' => $value,
            'group' => $group,
            'key' => $key,
        ];
    }

    /**
     * @param string $operator `==` is equal to, `!=` is not equal to, `>` is greater than, `<` is less than, `==pattern` matches pattern, `==contains` contains value, `==empty` has no value, `!=empty` has any value
     * @throws \InvalidArgumentException
     */
    public static function where(string $name, string $operator, mixed $value = null, ?string $group = null, ?string $key = null): static
    {
        $allowedOperators = [
            '>',
            '<',
            '==',
            '!=',
            '==pattern',
            '==contains',
            '==empty',
            '!=empty',
        ];

        if (!in_array($operator, $allowedOperators)) {
            throw new InvalidArgumentException("Invalid conditional logic operator [$operator].");
        }

        return new self($name, $operator, $value, $group, $key);
    }

    public function and(string|array $name, string $operator, mixed $value = null, ?string $group = null, ?string $key = null): static
    {
        $this->rules[] = [
            'name' => $name,
            'operator' => $operator,
            'value' => $value,
            'group' => $group,
            'field' => $key,
        ];

        return $this;
    }

    /** @internal */
    public function get(string|null $parentKey = null): array
    {
        return array_map(function ($rule) use ($parentKey) {
            $parentKey = $rule['group'] ?: $parentKey;

            $resolvedParentKey = Key::resolveParentKey($parentKey, Key::sanitize($rule['name']));
            $key = $resolvedParentKey . '_' . Key::sanitize($rule['name']);

            $newRule = [
                'field' => $rule['key'] ?? 'field_' . Key::hash($key),
                'operator' => $rule['operator'],
            ];

            if ($rule['value']) {
                $newRule['value'] = $rule['value'];
            }

            return $newRule;
        }, $this->rules);
    }
}
