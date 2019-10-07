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
        $this->assertSame('field_16217cde', $field['key']);
    }
}
