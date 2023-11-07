<?php

// This example is registering a Gutenberg block page using ACF. Please see the
// documentation for more information:
// https://www.advancedcustomfields.com/resources/blocks/

use Extended\ACF\Fields\PostObject;
use Extended\ACF\Location;

register_block_type(__DIR__ . '/block.json');

register_extended_field_group([
    'title' => 'Employee Block',
    'fields' => [
        PostObject::make('Employee')
            ->postTypes(['employee'])
            ->format('object')
    ],
    'location' => [
        Location::where('block', 'acf/employee')
    ],
]);
