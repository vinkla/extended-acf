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

use Extended\ACF\Fields\TrueFalse;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\DefaultValue;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class TrueFalseTest extends FieldTestCase
{
    use ConditionalLogic;
    use DefaultValue;
    use HelperText;
    use Required;
    use Wrapper;

    public string $field = TrueFalse::class;
    public string $type = 'true_false';

    public function testMessage()
    {
        $field = TrueFalse::make('Content')->message('Adam Whatan')->toArray();
        $this->assertSame('Adam Whatan', $field['message']);
    }

    public function testStylized()
    {
        $field = TrueFalse::make('Stylized')->stylized(off: 'Wax off')->toArray();
        $this->assertTrue($field['ui']);
        $this->assertArrayNotHasKey('ui_on_text', $field);
        $this->assertEquals($field['ui_off_text'], 'Wax off');
    }
}
