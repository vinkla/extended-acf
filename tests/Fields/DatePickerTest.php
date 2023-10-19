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

use Extended\ACF\Fields\DatePicker;
use PHPUnit\Framework\TestCase;

class DatePickerTest extends TestCase
{
    public function testType()
    {
        $field = DatePicker::make('Date Picker')->get();
        $this->assertSame('date_picker', $field['type']);
    }

    public function testDisplayFormat()
    {
        $field = DatePicker::make('Date Display Format')->displayFormat('d/m/Y')->get();
        $this->assertSame('d/m/Y', $field['display_format']);
    }

    public function testReturnFormat()
    {
        $field = DatePicker::make('Date Return Format')->returnFormat('d/m/Y')->get();
        $this->assertSame('d/m/Y', $field['return_format']);
    }

    public function testFirstDayOfWeek()
    {
        $field = DatePicker::make('Date Week Day')->firstDayOfWeek(1)->get();
        $this->assertSame(1, $field['first_day']);
    }
}
