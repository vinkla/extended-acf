<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\TimePicker;

class TimePickerTest extends TestCase
{
    public function testType()
    {
        $field = TimePicker::make('Time Picker')->toArray();
        $this->assertSame('time_picker', $field['type']);
    }
}
