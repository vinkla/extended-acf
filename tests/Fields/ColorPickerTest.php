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
use WordPlate\Acf\Fields\ColorPicker;

class ColorPickerTest extends TestCase
{
    public function testType()
    {
        $field = ColorPicker::make('Color Picker')->getSettings();
        $this->assertSame('color_picker', $field['type']);
    }

    public function testEnableOpacity()
    {
        $field = ColorPicker::make('Color Picker Enable Opacity')->enableOpacity()->getSettings();
        $this->assertTrue($field['enable_opacity']);
    }
}
