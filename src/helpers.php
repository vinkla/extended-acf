<?php

declare(strict_types=1);

use WordPlate\Acf\FieldGroup;

if (!function_exists('register_field_group')) {
    function register_field_group(array $config): void
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        $fieldGroup = new FieldGroup($config);

        acf_add_local_field_group($fieldGroup->toArray());
    }
}
