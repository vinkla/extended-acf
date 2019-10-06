<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Textarea;

class TextareaTest extends TestCase
{
    public function testType()
    {
        $field = Textarea::make('Textarea')->toArray();
        $this->assertSame('textarea', $field['type']);
    }

    public function testCharacterLimit()
    {
        $field = Textarea::make('Character Limit')->characterLimit(100)->toArray();
        $this->assertSame(100, $field['maxlength']);
    }

    public function testNewLines()
    {
        $field = Textarea::make('Description')->newLines('br')->toArray();
        $this->assertSame('br', $field['new_lines']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument new lines [test].');

        Textarea::make('Message')->newLines('test')->toArray();
    }

    public function testRows()
    {
        $field = Textarea::make('Rows')->rows(10)->toArray();
        $this->assertSame(10, $field['rows']);
    }
}
