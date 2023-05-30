<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\ButtonGroup;
use PHPUnit\Framework\TestCase;

class ButtonGroupTest extends TestCase
{
    public function testType()
    {
        $field = ButtonGroup::make('Button Group')->get();
        $this->assertSame('button_group', $field['type']);
    }

    public function testChoices()
    {
        $choices = ['blue' => 'Blue Pill', 'red' => 'Red Pill'];
        $field = ButtonGroup::make('Choices')->choices($choices)->get();
        $this->assertSame($choices, $field['choices']);

        $choices = ['Forest Green', 'Sky Blue'];
        $field = ButtonGroup::make('Choices List')->choices($choices)->get();
        $this->assertSame(['forest_green' => 'Forest Green', 'sky_blue' => 'Sky Blue'], $field['choices']);
    }
}
