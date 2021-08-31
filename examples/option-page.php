<?php

// This example is registering a option page using ACF. Please see the
// documentation for more information:
// https://www.advancedcustomfields.com/resources/acf_add_options_page/

use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\WysiwygEditor;
use WordPlate\Acf\Location;

acf_add_options_page([
    'icon_url' => 'dashicons-star-filled', // https://developer.wordpress.org/resource/dashicons/
    'menu_slug' => 'cookie',
    'page_title' => 'Cookie',
    'position' => 21,
]);

register_extended_field_group([
    'title' => 'Cookie',
    'fields' => [
        WysiwygEditor::make('Text', 'cookie_text')
            ->instructions('Add the cookie disclaimer text.')
            ->mediaUpload(false)
            ->toolbar('link')
            ->tabs('visual')
            ->required(),
        Text::make('Label', 'cookie_label')
            ->instructions('Add the button label.')
            ->required(),
    ],
    'location' => [
        Location::if('options_page', 'cookie'),
    ],
]);
