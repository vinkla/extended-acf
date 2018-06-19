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

namespace WordPlate\Acf\Attributes;

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
     * Generate a new field, group or layout key.
     *
     * @param string $key
     * @param string $prefix
     *
     * @return string
     */
    public static function generate(string $key, string $prefix): string
    {
        $key = sprintf('%s_%s', $prefix, static::hash($key));

        static::validate($key, $prefix);

        static::$keys[] = $key;

        return $key;
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
     * Validate a given key's uniqness.
     *
     * @param string $key
     * @param string $prefix
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    public static function validate(string $key, string $prefix): string
    {
        if (in_array($key, self::$keys)) {
            throw new InvalidArgumentException("The key [$key] is not unique.");
        }

        if (strpos($key, $prefix) === false) {
            throw new InvalidArgumentException("The key must be prefixed with [$prefix].");
        }

        return $key;
    }
}
