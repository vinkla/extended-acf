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

use WordPlate\Acf\FieldGroup;

if (!function_exists('register_extended_field_group')) {
    /** Register ACF field group. */
    function register_extended_field_group(array $config): void
    {
        $fieldGroup = new FieldGroup($config);

        register_field_group($fieldGroup->getSettings());
    }
}
