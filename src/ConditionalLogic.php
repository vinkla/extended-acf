<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf;

/**
 * This is the conditional logic class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class ConditionalLogic
{
    /**
     * The field name.
     *
     * @var string
     */
    protected $name;

    /**
     * The comparison operator.
     *
     * @var string
     */
    protected $operator;

    /**
     * The parent field's key.
     *
     * @var string
     */
    protected $parentKey;

    /**
     * The comparison value.
     *
     * @var string
     */
    protected $value;

    /**
     * Create a new conditional logic instance.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Create a new conditional logic rule.
     *
     * @param string $name
     *
     * @return self
     */
    public static function if(string $name): self
    {
        return new self($name);
    }

    /**
     * The value is greater than.
     *
     * @param int $value
     *
     * @return self
     */
    public function greaterThan(int $value): self
    {
        $this->operator = '>';
        $this->value = $value;

        return $this;
    }

    /**
     * The value is less than.
     *
     * @param int $value
     *
     * @return self
     */
    public function lessThan(int $value): self
    {
        $this->operator = '<';
        $this->value = $value;

        return $this;
    }

    /**
     * The value equals.
     *
     * @param mixed $value
     *
     * @return self
     */
    public function equals($value): self
    {
        $this->operator = '==';
        $this->value = $value;

        return $this;
    }

    /**
     * The value not equals.
     *
     * @var string
     */
    public function notEquals($value): self
    {
        $this->operator = '!=';
        $this->value = $value;

        return $this;
    }

    /**
     * The value contains.
     *
     * @param mixed $value
     *
     * @return self
     */
    public function contains($value): self
    {
        $this->operator = '==contains';
        $this->value = $value;

        return $this;
    }

    /**
     * The value is empty.
     *
     * @return self
     */
    public function empty(): self
    {
        $this->operator = '==empty';

        return $this;
    }

    /**
     * The value is not empty.
     *
     * @return self
     */
    public function notEmpty(): self
    {
        $this->operator = '!=empty';

        return $this;
    }

    /**
     * Set the parent field's key.
     *
     * @param string $parentKey
     *
     * @return void
     */
    public function setParentKey(string $parentKey): void
    {
        $this->parentKey = $parentKey;
    }

    /**
     * Return the conditional logic rule as an array.
     *
     * @return array
     */
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
