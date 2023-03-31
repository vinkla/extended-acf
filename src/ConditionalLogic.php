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
        string|array $field,
        string $operator,
        mixed $value = null
    ) {
        $this->rules[] = $this->createRule($field, $operator, $value);
    }

    /**
     * @param string $operator `==` is equal to, `!=` is not equal to, `>` is greater than, `<` is less than, `==pattern` matches pattern, `==contains` contains value, `==empty` has no value, `!=empty` has any value
     * @throws \InvalidArgumentException
     */
    public static function where(string|array $field, string $operator, mixed $value = null): static
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

        return new self($field, $operator, $value);
    }

    public function and(string|array $field, string $operator, mixed $value = null): static
    {
        $this->rules[] = $this->createRule($field, $operator, $value);
        return $this;
    }

    private function createRule(string|array $field, string $operator, mixed $value = null): array
    {
        return [
            'field' => is_array($field) ? $field : ['group' => false, 'name' => $field],
            'operator' => $operator,
            'value' => $value,
        ];
    }

    /** @internal */
    public function get(?string $parentKey = null): array
    {
        return array_map(function ($rule) use ($parentKey) {
            $rule['name'] = $rule['field']['name'];
            $parentKey = $rule['field']['group'] ?: $parentKey;
            unset($rule['field']['group']);

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
