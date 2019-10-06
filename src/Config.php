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
 * This is the config repository class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
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
     *
     * @return void
     */
    public function __construct(array $items)
    {
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
     * Set a given configuration value.
     *
     * @param string $key
     * @param mixed $value
     *
     * @return void
     */
    public function set(string $key, $value): void
    {
        $this->items[$key] = $value;
    }

    /**
     * Get the specified configuration value.
     *
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return $this->items[$key] ?? $default;
    }

    /**
     * Get all the configuration items.
     *
     * @return array
     */
    public function all(): array
    {
        return $this->items;
    }
}
