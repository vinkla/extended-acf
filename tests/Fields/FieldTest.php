<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Text;

class FieldTest extends TestCase
{
    public function testLabel()
    {
        $field = Text::make('Name')->toArray();
        $this->assertSame('Name', $field['label']);
    }

    public function testName()
    {
        $field = Text::make('Email')->toArray();
        $this->assertSame('email', $field['name']);

        $field = Text::make('Category', 'tag')->toArray();
        $this->assertSame('tag', $field['name']);
    }

    public function testKey()
    {
        $field = Text::make('Phone')->toArray();
        $this->assertSame('field_773611af', $field['key']);
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

        $field = Text::make('Label')->width(50)->toArray();
        $this->assertSame(50, $field['wrapper']['width']);
    }
}
