<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Text;

class TextTest extends TestCase
{
    public function testType()
    {
        $field = Text::make('Text')->toArray();
        $this->assertSame('text', $field['type']);
    }

    public function testRequired()
    {
        $field = Text::make('Title')->required()->toArray();
        $this->assertTrue($field['required']);
    }

    public function testInstructions()
    {
        $field = Text::make('Heading')->instructions('Add the text content')->toArray();
        $this->assertSame('Add the text content', $field['instructions']);
    }

    public function testWrapper()
    {
        $field = Text::make('Status')->wrapper(['id' => 'status'])->toArray();
        $this->assertSame(['id' => 'status'], $field['wrapper']);
    }
}
