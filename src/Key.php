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
 * This is the key class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Key
{
    /**
     * The unique key list.
     *
     * @var string[]
     */
    protected static $keys = [];

    /**
     * Generate a new field or group key.
     *
     * @param string $prefix
     * @param string $key
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public static function generate(string $prefix, string $key): string
    {
        $key = sprintf('%s_%s', $prefix, static::hash($key));

        if (in_array($key, self::$keys)) {
            throw new InvalidArgumentException("The key [$key] is not unique.");
        }

        static::$keys[] = $key;

        return $key;
    }

    /**
     * Sanitize key and convert to snake case.
     *
     * @param string $key
     *
     * @return string
     */
    public static function sanitize(string $key): string
    {
        return str_replace('-', '_', sanitize_title($key));
    }

    /**
     * Hash a given string using the FNV-1a algorithm.
     *
     * @see https://softwareengineering.stackexchange.com/a/145633
     *
     * @param string $key
     *
     * @return string
     */
    public static function hash(string $key): string
    {
        return hash('fnv1a32', $key);
    }
}
