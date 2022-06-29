<?php

use Extended\ACF\Fields\Email;
use Extended\ACF\Fields\Text;
use Extended\ACF\Location;

register_extended_field_group([
    'title' => 'Employee',
    'fields' => [
        Text::make('Title')
            ->instructions('Add the employee title.')
            ->required(),
        Email::make('Email address', 'email')
            ->instructions('Add the employee email address.')
            ->required(),
        Text::make('Phone number', 'phone')
            ->instructions('Add the employee phone number.'),
    ],
    'location' => [
        Location::where('post_type', 'employee'),
    ],
]);
