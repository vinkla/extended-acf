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
use WordPlate\Acf\Fields\TrueFalse;

class TrueFalseTest extends TestCase
{
    public function testType()
    {
        $field = TrueFalse::make('True False')->toArray();
        $this->assertSame('true_false', $field['type']);
    }

    public function testUi()
    {
        $field = TrueFalse::make('UI')->ui()->toArray();
        $this->assertTrue($field['ui']);
    }

    public function testUiLabels()
    {
        $field = TrueFalse::make('UI')->ui('Hello', 'World')->toArray();
        $this->assertTrue($field['ui']);
        $this->assertEquals($field['ui_on_text'], 'Hello');
        $this->assertEquals($field['ui_off_text'], 'World');
    }
}
