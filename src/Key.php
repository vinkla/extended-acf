<?php

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
     * Hash a given string.
     *
     * @param string $key
     *
     * @return string
     */
    public static function hash(string $key): string
    {
        return md5($key);
    }
}
