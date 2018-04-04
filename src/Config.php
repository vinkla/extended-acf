<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf;

use InvalidArgumentException;

/**
 * This is the settings class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Config
{
    /**
     * The items array.
     *
     * @var array
     */
    protected $items;

    /**
     * Create a new config instance.
     *
     * @param array $items
     * @param array $keys
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function __construct(array $items, array $keys = [])
    {
        foreach ($keys as $key) {
            if (!array_key_exists($key, $items)) {
                throw new InvalidArgumentException("Missing setting key [$key].");
            }
        }

        $this->items = $items;
    }

    public function has($key)
    {
        return array_key_exists($key, $this->items);
    }

    public function get($key)
    {
        return $this->items[$key];
    }

    public function toArray()
    {
        return $this->items;
    }
}
