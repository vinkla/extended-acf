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

    public function testNewLines()
    {
        $field = Textarea::make('Description')->newLines('br')->toArray();
        $this->assertSame('br', $field['new_lines']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid new_lines argument [test].');

        Textarea::make('Message')->newLines('test')->toArray();
    }
}
