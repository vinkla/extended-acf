<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\DateTimePicker;

class DateTimePickerTest extends TestCase
{
    public function testType()
    {
        $field = DateTimePicker::make('Date Time Picker')->toArray();
        $this->assertSame('date_time_picker', $field['type']);
    }
}
