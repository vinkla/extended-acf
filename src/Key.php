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

use InvalidArgumentException;

class Key
{
    protected static $keys = [];

    public static function generate(string $key, string $prefix): string
    {
        $key = sprintf('%s_%s', $prefix, static::hash($key));

        static::validate($key, $prefix);

        static::$keys[] = $key;

        return $key;
    }

    public static function hash(string $key): string
    {
        return hash('fnv1a32', $key);
    }

    public static function sanitize(string $key): string
    {
        return str_replace('-', '_', sanitize_title($key));
    }

    /** @throws \InvalidArgumentException */
    public static function validate(string $key, string $prefix): string
    {
        // Validate if the key is unique or not.
        if (in_array($key, self::$keys)) {
            throw new InvalidArgumentException("The key [$key] is not unique.");
        }

        // Validate if the key contains the the given prefix or not.
        if (strpos($key, $prefix) === false) {
            throw new InvalidArgumentException("The key must be prefixed with [$prefix].");
        }

        return $key;
    }
}
