<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\ColorPicker;

class ColorPickerTest extends TestCase
{
    public function testType()
    {
        $field = ColorPicker::make('Color Picker')->toArray();
        $this->assertSame('color_picker', $field['type']);
    }
}
