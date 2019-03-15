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

return [
    'title' => 'About',
    'key' => 'group_about',
    'fields' => [
        acf_image(['name' => 'image', 'label' => 'Image']),
        acf_text([
            'name' => 'title',
            'label' => 'Title',
            'conditional_logic' => [
                [
                    acf_conditional('type', 'image'),
                ],
            ],
        ]),
    ],
    'location' => [
        [
            acf_location('post_type', 'post'),
            acf_location('post_type', '!=', 'page'),
        ],
    ],
];
