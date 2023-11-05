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

use Extended\ACF\Fields\Textarea;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\DefaultValue;
use Extended\ACF\Tests\Fields\Settings\Disabled;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Immutable;
use Extended\ACF\Tests\Fields\Settings\MaxLength;
use Extended\ACF\Tests\Fields\Settings\NewLines;
use Extended\ACF\Tests\Fields\Settings\Placeholder;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class TextareaTest extends FieldTestCase
{
    use ConditionalLogic;
    use DefaultValue;
    use Disabled;
    use HelperText;
    use Immutable;
    use MaxLength;
    use NewLines;
    use Placeholder;
    use Required;
    use Wrapper;

    public string $field = Textarea::class;
    public string $type = 'textarea';

    public function testRows()
    {
        $field = Textarea::make('Rows')->rows(10)->get();
        $this->assertSame(10, $field['rows']);
    }
}
