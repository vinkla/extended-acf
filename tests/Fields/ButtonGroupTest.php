<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\ButtonGroup;

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
    }
}
