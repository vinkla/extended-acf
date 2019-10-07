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

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\ButtonGroup;

class ButtonGroupTest extends TestCase
{
    public function testType()
    {
        $field = ButtonGroup::make('Button Group')->toArray();
        $this->assertSame('button_group', $field['type']);
    }

    public function testChoices()
    {
        $choices = ['blue' => 'Blue Pill', 'red' => 'Red Pill'];
        $field = ButtonGroup::make('Choices')->choices($choices, 'blue')->toArray();
        $this->assertSame($choices, $field['choices']);
        $this->assertSame('blue', $field['default_value']);
    }
}
