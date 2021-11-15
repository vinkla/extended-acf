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

namespace WordPlate\Acf;

class ConditionalLogic
{
    protected string $name;
    protected string|null $operator = null;
    protected mixed $value = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function if(string $name): static
    {
        return new self($name);
    }

    public function greaterThan(int $value): static
    {
        $this->operator = '>';
        $this->value = $value;

        return $this;
    }

    public function lessThan(int $value): static
    {
        $this->operator = '<';
        $this->value = $value;

        return $this;
    }

    public function equals(mixed $value): static
    {
        $this->operator = '==';
        $this->value = $value;

        return $this;
    }

    public function notEquals(mixed $value): static
    {
        $this->operator = '!=';
        $this->value = $value;

        return $this;
    }

    public function pattern(string $pattern): static
    {
        $this->operator = '==pattern';
        $this->value = $pattern;

        return $this;
    }

    public function contains(mixed $value): static
    {
        $this->operator = '==contains';
        $this->value = $value;

        return $this;
    }

    public function empty(): static
    {
        $this->operator = '==empty';

        return $this;
    }

    public function notEmpty(): static
    {
        $this->operator = '!=empty';

        return $this;
    }

    /** @internal */
    public function get(string|null $parentKey = null): array
    {
        $parentKey = Key::resolveParentKey($parentKey, Key::sanitize($this->name));

        $key = sprintf('%s_%s', $parentKey, Key::sanitize($this->name));

        $rule = [
            'field' => sprintf('field_%s', Key::hash($key)),
            'operator' => $this->operator,
        ];

        if ($this->value) {
            $rule['value'] = $this->value;
        }

        return $rule;
    }
}
