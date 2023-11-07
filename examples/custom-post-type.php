<?php

declare(strict_types=1);

use Extended\ACF\Fields\Email;
use Extended\ACF\Fields\Text;
use Extended\ACF\Location;

register_extended_field_group([
    'title' => 'Employee',
    'fields' => [
        Text::make('Title')
            ->helperText('Add the employee title.')
            ->required(),
        Email::make('Email address', 'email')
            ->helperText('Add the employee email address.')
            ->required(),
        Text::make('Phone number', 'phone')
            ->helperText('Add the employee phone number.'),
    ],
    'location' => [
        Location::where('post_type', 'employee'),
    ],
]);
