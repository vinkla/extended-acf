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
        $hashedKey = sprintf('%s_%s', $prefix, static::hash($key));

        static::validate($hashedKey, $prefix, $key);

        static::$keys[] = $hashedKey;

        return $hashedKey;
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
    public static function validate(string $key, string $prefix, string $originalKey = null): string
    {
        // TODO: $originalKey can't be null in the next major version.

        // Validate if the key is unique or not.
        if (in_array($key, self::$keys)) {
            // TODO: Remove the hashed $key in the error message in next major version.
            $key = $originalKey ?? $key;

            throw new InvalidArgumentException("The key [$key] is not unique.");
        }

        // Validate if the key contains the the given prefix or not.
        if (strpos($key, $prefix) === false) {
            throw new InvalidArgumentException("The key must be prefixed with [$prefix].");
        }

        return $key;
    }
    public static function resolve($parentKey = '', $key) { // _mwmw_test_parent_key, some_text
        $hashedKey = self::hash($parentKey . '_' . $key); //  349f9s
        $parentKeyPieces = explode('_', $parentKey); // [ '', 'mwmw', 'test', 'parent', 'key' ]

        // If field_349f9s (_mwmw_test_parent_key_some_text) does not exist in self::$keys
        if( ! in_array( 'field_' . $hashedKey, self::$keys )) {

            // Remove last '_item' of parent key and check again.
            while( count($parentKeyPieces) > 1 ) {
                $parentKeyPiece = array_pop($parentKeyPieces); // [ '', 'mwmw', 'test', 'parent' ]
                $potentialParentKey = join('_', $parentKeyPieces); // _mwm_test_parent
                
                $hashedKey = self::hash($potentialParentKey . '_' . $key); // 235efe
                if(in_array( 'field_' . $hashedKey, self::$keys )) { // Check if field_235efe is in self::$keys
                    $parentKey = $potentialParentKey;
                    break;
                }
            }
        }
        return $parentKey;
    }
}
