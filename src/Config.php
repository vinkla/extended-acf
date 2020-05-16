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

class Config
{
    /** @var array */
    protected $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->items);
    }

    /** @param mixed $value */
    public function set(string $key, $value): void
    {
        $this->items[$key] = $value;
    }

    /**
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return $this->items[$key] ?? $default;
    }

    public function all(): array
    {
        return $this->items;
    }
}
