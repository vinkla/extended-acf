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

use WordPlate\Acf\FieldGroup;

if (!function_exists('register_field_group')) {
    /**
     * Register ACF field group.
     *
     * @param array $config
     *
     * @return void
     */
    function register_field_group(array $config): void
    {
        if (function_exists('acf_add_local_field_group')) {
            $fieldGroup = new FieldGroup($config);

            acf_add_local_field_group($fieldGroup->toArray());
        }
    }
}
