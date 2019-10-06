<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\DatePicker;

class DatePickerTest extends TestCase
{
    public function testType()
    {
        $field = DatePicker::make('Date Picker')->toArray();
        $this->assertSame('date_picker', $field['type']);
    }

    public function testDisplayFormat()
    {
        $field = DatePicker::make('Date Display Format')->displayFormat('d/m/Y')->toArray();
        $this->assertSame('d/m/Y', $field['display_format']);
    }

    public function testReturnFormat()
    {
        $field = DatePicker::make('Date Return Format')->returnFormat('d/m/Y')->toArray();
        $this->assertSame('d/m/Y', $field['return_format']);
    }

    public function testWeekStartsOnn()
    {
        $field = DatePicker::make('Date Week Day')->weekStartsOn(1)->toArray();
        $this->assertSame(1, $field['first_day']);
    }
}
