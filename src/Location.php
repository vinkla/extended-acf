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
 * This is the location class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class Location
{
    /**
     * The location rules.
     *
     * @var array
     */
    protected $rules = [];

    /**
     * Create a new location instance.
     *
     * @param string $param
     * @param string $operator
     * @param string $value
     *
     * @return void
     */
    public function __construct(string $param, string $operator, string $value = null)
    {
        $this->rules[] = compact('param', 'operator', 'value');
    }

    /**
     * Declare a new location rule.
     *
     * @param string $param
     * @param string $operator
     * @param string $value
     *
     * @return self
     */
    public static function if(string $param, string $operator, string $value = null): self
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '==';
        }

        return new self($param, $operator, $value);
    }

    /**
     * Declare a new location rule.
     *
     * @param string $param
     * @param string $operator
     * @param string $value
     *
     * @return self
     */
    public function and(string $param, string $operator, string $value = null): self
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '==';
        }

        $this->rules[] = compact('param', 'operator', 'value');

        return $this;
    }

    /**
     * Return the location rules as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->rules;
    }
}
