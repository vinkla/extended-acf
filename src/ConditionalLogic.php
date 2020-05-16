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
    /** @var string */
    protected $name;

    /** @var string */
    protected $operator;

    /** @var string */
    protected $parentKey;

    /** @var mixed */
    protected $value;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function if(string $name): self
    {
        return new self($name);
    }

    public function greaterThan(int $value): self
    {
        $this->operator = '>';
        $this->value = $value;

        return $this;
    }

    public function lessThan(int $value): self
    {
        $this->operator = '<';
        $this->value = $value;

        return $this;
    }

    /** @param mixed $value */
    public function equals($value): self
    {
        $this->operator = '==';
        $this->value = $value;

        return $this;
    }

    /** @param mixed $value */
    public function notEquals($value): self
    {
        $this->operator = '!=';
        $this->value = $value;

        return $this;
    }

    /** @param mixed $value */
    public function contains($value): self
    {
        $this->operator = '==contains';
        $this->value = $value;

        return $this;
    }

    public function empty(): self
    {
        $this->operator = '==empty';

        return $this;
    }

    public function notEmpty(): self
    {
        $this->operator = '!=empty';

        return $this;
    }

    public function setParentKey(string $parentKey): void
    {
        $this->parentKey = $parentKey;
    }

    public function toArray(): array
    {
        $key = sprintf('%s_%s', $this->parentKey, Key::sanitize($this->name));

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
