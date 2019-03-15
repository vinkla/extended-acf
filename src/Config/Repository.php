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

namespace WordPlate\Acf\Config;

use InvalidArgumentException;

/**
 * This is the config repository class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class Repository
{
    /**
     * The items array.
     *
     * @var array
     */
    protected $items;

    /**
     * Create a new config repository instance.
     *
     * @param array $items
     * @param array $required
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function __construct(array $items, array $required = [])
    {
        foreach ($required as $key) {
            if (!array_key_exists($key, $items)) {
                throw new InvalidArgumentException("Missing configuration key [$key].");
            }
        }

        $this->items = $items;
    }

    /**
     * Determine if the given configuration value exists.
     *
     * @param string $key
     *
     * @return bool
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Get the specified configuration value.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get(string $key)
    {
        return $this->items[$key];
    }

    /**
     * Return the config items as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->items;
    }
}
