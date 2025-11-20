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

use Extended\ACF\Fields\IconPicker;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\DefaultValue;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class IconPickerTest extends FieldTestCase
{
    use ConditionalLogic;
    use DefaultValue;
    use HelperText;
    use Required;
    use Wrapper;

    public string $field = IconPicker::class;
    public string $type = 'icon_picker';

    public function testFormat()
    {
        $field = IconPicker::make('Icon Picker Format')->format('array')->toArray();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        IconPicker::make('Invalid Format')->format('test')->toArray();
    }

    public function testTabs()
    {
        $field = IconPicker::make('Icon Picker Tabs')->tabs(['dashicons'])->toArray();
        $this->assertSame(['dashicons'], $field['tabs']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument tab [test].');

        $field = IconPicker::make('Invalid Tab')->tabs(['test'])->toArray();
    }
}
