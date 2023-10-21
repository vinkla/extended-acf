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
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class TextareaTest extends TestCase
{
    public function testType()
    {
        $field = Textarea::make('Textarea')->get();
        $this->assertSame('textarea', $field['type']);
    }

    public function testMaxLength()
    {
        $field = Textarea::make('Max Length')->maxLength(100)->get();
        $this->assertSame(100, $field['maxlength']);
    }

    public function testNewLines()
    {
        $field = Textarea::make('Description')->newLines('br')->get();
        $this->assertSame('br', $field['new_lines']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument new lines [test].');

        Textarea::make('Message')->newLines('test')->get();
    }

    public function testRows()
    {
        $field = Textarea::make('Rows')->rows(10)->get();
        $this->assertSame(10, $field['rows']);
    }
}
