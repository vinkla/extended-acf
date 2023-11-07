<?php

declare(strict_types=1);

// This example is using the Extended CPTs package to register custom post types
// and taxanomies. Please see the repository for more information:
// https://github.com/johnbillion/extended-cpts

use Extended\ACF\Fields\WYSIWYGEditor;
use Extended\ACF\Location;

register_extended_post_type('faq', [
    'menu_icon' => 'dashicons-format-chat',
    'has_archive' => false,
    'supports' => ['title', 'revisions'],
    'admin_cols' => [
        'category' => [
            'taxonomy' => 'topic',
        ],
    ],
    'taxonomies' => ['topic'],
], [
    'singluar' => 'FAQ',
    'plural' => 'FAQ',
    'slug' => 'faq',
]);

register_extended_taxonomy('topic', 'faq', [
    'hierarchical' => false,
    'meta_box' => 'radio',
    'required' => true,
    'hierarchical' => false,
    'show_in_rest' => true,
]);

// In this example we use the title as the question.

register_extended_field_group([
    'title' => 'FAQ',
    'fields' => [
        WYSIWYGEditor::make('Answer')
            ->helperText('Add the question answer.')
            ->disableMediaUpload()
            ->tabs('visual')
            ->required(),
    ],
    'location' => [
        Location::where('post_type', 'faq'),
    ],
]);
