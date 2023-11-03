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

use Extended\ACF\Fields\RadioButton;
use Extended\ACF\Tests\Fields\Settings\Choices;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\DefaultValue;
use Extended\ACF\Tests\Fields\Settings\DirectionLayout;
use Extended\ACF\Tests\Fields\Settings\Disabled;
use Extended\ACF\Tests\Fields\Settings\Instructions;
use Extended\ACF\Tests\Fields\Settings\Nullable;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class RadioButtonTest extends FieldTestCase
{
    use Choices;
    use ConditionalLogic;
    use DefaultValue;
    use DirectionLayout;
    use Disabled;
    use Instructions;
    use Nullable;
    use Required;
    use Wrapper;

    public string $field = RadioButton::class;
    public string $type = 'radio';

    public function testFormat()
    {
        $field = RadioButton::make('Radio Button Format')->format('label')->get();
        $this->assertSame('label', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        RadioButton::make('Invalid Format')->format('test')->get();
    }
}
