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

class Location
{
    protected $rules = [];

    public function __construct(string $param, string $operator, ?string $value = null)
    {
        $this->rules[] = compact('param', 'operator', 'value');
    }

    public static function if(string $param, string $operator, ?string $value = null): self
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '==';
        }

        return new self($param, $operator, $value);
    }

    public function and(string $param, string $operator, ?string $value = null): self
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '==';
        }

        $this->rules[] = compact('param', 'operator', 'value');

        return $this;
    }

    public function toArray(): array
    {
        return $this->rules;
    }
}
