<?php

// This example is registering a option page using ACF. Please see the
// documentation for more information:
// https://www.advancedcustomfields.com/resources/acf_add_options_page/

use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;
use Extended\ACF\Location;

acf_add_options_page([
    'icon_url' => 'dashicons-star-filled', // https://developer.wordpress.org/resource/dashicons/
    'menu_slug' => 'cookie',
    'page_title' => 'Cookie',
    'position' => 21,
]);

register_extended_field_group([
    'title' => 'Cookie',
    'fields' => [
        WYSIWYGEditor::make('Text', 'cookie_text')
            ->helperText('Add the cookie disclaimer text.')
            ->disableMediaUpload()
            ->tabs('visual')
            ->required(),
        Text::make('Label', 'cookie_label')
            ->helperText('Add the button label.')
            ->required(),
    ],
    'location' => [
        Location::where('options_page', 'cookie'),
    ],
]);
