<?php

declare(strict_types=1);

use WordPlate\Acf\Fields\PostObject;
use WordPlate\Acf\Location;

acf_register_block_type([
    'name' => 'Employee',
    'title' => 'Employee',
    'render_template' => get_theme_file_path('path/to/template.php'),
    'category' => 'text',
    'icon' => 'admin-users', // https://developer.wordpress.org/resource/dashicons/
]);

register_extended_field_group([
    'title' => 'Employee Block',
    'fields' => [
        PostObject::make('Employee')
            ->postTypes(['employee'])
            ->returnFormat('object')
    ],
    'location' => [
        Location::if('block', 'acf/employee')
    ],
]);
