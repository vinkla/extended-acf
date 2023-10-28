<?php

/**
 * Copyright (c) Vincent Klaiber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields\Settings;

use Extended\ACF\Fields\Text;

trait Fields
{
    public function testFields()
    {
        $field = $this->make('Fields')
            ->fields([
                Text::make('Title'),
            ])
            ->get();

        $this->assertSame('Title', $field['sub_fields'][0]['label']);
    }
}
