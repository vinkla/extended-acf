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
    public $rules;
    public function __construct(
        protected string $name,
        protected string $operator,
        protected mixed $value = null
    ) {
        $this->rules[] = $this->createRule($name, $operator, $value);
    }

    /**
     * @param string $operator `==` is equal to, `!=` is not equal to, `>` is greater than, `<` is less than, `==pattern` matches pattern, `==contains` contains value, `==empty` has no value, `!=empty` has any value
     * @throws \InvalidArgumentException
     */
    public static function where(string $name, string $operator, mixed $value = null): static
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

        return new self($name, $operator, $value);
    }

    public function and(string $name, string $operator, mixed $value = null): static
    {
        $this->rules[] = $this->createRule($name, $operator, $value);
        return $this;
    }

    private function createRule(string $name, string $operator, mixed $value = null): array
    {
        return [
            'name' => $name,
            'operator' => $operator,
            'value' => $value,
        ];
    }

    /** @internal */
    public function get(string|null $parentKey = null): array
    {
        $defaultParentKey = $parentKey;

        return array_map(function ($rule) use ($defaultParentKey) {
            $parentKey = Key::resolveParentKey($defaultParentKey, Key::sanitize($rule['name']));
            $key = $parentKey . '_' . Key::sanitize($rule['name']);

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

    /** @internal */
    public function getRules(): array
    {
        return $this->rules;
    }
}
