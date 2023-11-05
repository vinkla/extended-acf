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

use Extended\ACF\Fields\Select;
use Extended\ACF\Tests\Fields\Settings\Choices;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\DefaultValue;
use Extended\ACF\Tests\Fields\Settings\Disabled;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Immutable;
use Extended\ACF\Tests\Fields\Settings\Multiple;
use Extended\ACF\Tests\Fields\Settings\Nullable;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class SelectTest extends FieldTestCase
{
    use Choices;
    use ConditionalLogic;
    use DefaultValue;
    use Disabled;
    use HelperText;
    use Immutable;
    use Multiple;
    use Nullable;
    use Required;
    use Wrapper;

    public string $field = Select::class;
    public string $type = 'select';

    public function testFormat()
    {
        $field = Select::make('Select Format')->format('array')->get();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        Select::make('Invalid Format')->format('test')->get();
    }

    public function testStylized()
    {
        $field = Select::make('Select Stylized')->stylized()->get();
        $this->assertTrue($field['ui']);
    }

    public function testLazyLoad()
    {
        $field = Select::make('Select Lazy Load')->lazyLoad()->get();
        $this->assertTrue($field['ui']);
        $this->assertTrue($field['ajax']);
    }
}
