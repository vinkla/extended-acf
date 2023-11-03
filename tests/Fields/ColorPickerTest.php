<?php

/**
 * Copyright (c) Vincent Klaiber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\ColorPicker;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\DefaultValue;
use Extended\ACF\Tests\Fields\Settings\Instructions;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class ColorPickerTest extends FieldTestCase
{
    use ConditionalLogic;
    use DefaultValue;
    use Instructions;
    use Required;
    use Wrapper;

    public string $field = ColorPicker::class;
    public string $type = 'color_picker';

    public function testOpacity()
    {
        $field = ColorPicker::make('Opacity')->opacity()->get();
        $this->assertTrue($field['enable_opacity']);
    }

    public function testFormat()
    {
        $field = ColorPicker::make('Color Picker Format')->format('array')->get();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        ColorPicker::make('Invalid Format')->format('test')->get();
    }
}
