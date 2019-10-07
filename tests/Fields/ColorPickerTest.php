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
use WordPlate\Acf\Fields\ColorPicker;

class ColorPickerTest extends TestCase
{
    public function testType()
    {
        $field = ColorPicker::make('Color Picker')->toArray();
        $this->assertSame('color_picker', $field['type']);
    }
}
