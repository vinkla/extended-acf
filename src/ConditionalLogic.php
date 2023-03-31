<?php

/**
 * Copyright (c) Vincent Klaiber.
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
        string $group = null
    ) {
        $this->rules[] = $this->rule($name, $operator, $value, $group);
    }

    /**
     * @param string $operator `==` is equal to, `!=` is not equal to, `>` is greater than, `<` is less than, `==pattern` matches pattern, `==contains` contains value, `==empty` has no value, `!=empty` has any value
     * @throws \InvalidArgumentException
     */
    public static function where(string $name, string $operator, mixed $value = null, string $group = null): static
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

        return new self($name, $operator, $value, $group);
    }

    public function and(string|array $name, string $operator, mixed $value = null, string $group = null): static
    {
        $this->rules[] = $this->rule($name, $operator, $value, $group);

        return $this;
    }

    private function rule(string|array $name, string $operator, mixed $value = null, string $group = null): array
    {
        return [
            'name' => $name,
            'operator' => $operator,
            'value' => $value,
            'group' => $group,
        ];
    }

    /** @internal */
    public function get(string|null $parentKey = null): array
    {
        return array_map(function ($rule) use ($parentKey) {
            $parentKey = $rule['group'] ?: $parentKey;

            $resolvedParentKey = Key::resolveParentKey($parentKey, Key::sanitize($rule['name']));
            $key = $resolvedParentKey . '_' . Key::sanitize($rule['name']);

            $newRule = [
                'field' => 'field_' . Key::hash($key),
                'operator' => $rule['operator'],
            ];

            if ($rule['value']) {
                $newRule['value'] = $rule['value'];
            }

            return $newRule;
        }, $this->rules);
    }
}
