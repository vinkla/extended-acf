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

use Extended\ACF\Fields\Checkbox;

use Extended\ACF\Tests\Fields\Settings\Choices;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\DefaultValue;
use Extended\ACF\Tests\Fields\Settings\DirectionLayout;
use Extended\ACF\Tests\Fields\Settings\Disabled;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class CheckboxTest extends FieldTestCase
{
    use Choices;
    use ConditionalLogic;
    use DefaultValue;
    use DirectionLayout;
    use Disabled;
    use HelperText;
    use Required;
    use Wrapper;

    public string $field = Checkbox::class;
    public string $type = 'checkbox';

    public function testFormat()
    {
        $field = Checkbox::make('Checkbox Format')->format('array')->get();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        Checkbox::make('Invalid Format')->format('test')->get();
    }
}
