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
use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\Fields\Text;

class TextTest extends TestCase
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

    public function testConditionalLogic()
    {
        $field = Text::make('Conditional Logic')
            ->conditionalLogic([
                ConditionalLogic::if('type')->empty(),
            ])
            ->conditionalLogic([
                ConditionalLogic::if('title')->contains('ACF'),
            ])
            ->toArray();

        $this->assertSame('==empty', $field['conditional_logic'][0][0]['operator']);
        $this->assertSame('==contains', $field['conditional_logic'][1][0]['operator']);
    }
}
