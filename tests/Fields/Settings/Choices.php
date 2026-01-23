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

trait Choices
{
    public function testChoices()
    {
        $choices = ['blue' => 'Blue Pill'];
        $field = $this->make('Choices')->choices($choices)->toArray();
        $this->assertSame($choices, $field['choices']);

        $choices = ['Forest Green'];
        $field = $this->make('Choices List')->choices($choices)->toArray();
        $this->assertSame(['forest_green' => 'Forest Green'], $field['choices']);
    }
}
