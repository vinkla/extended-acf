<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\Text;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\VarDumper\VarDumper;

class TextTest extends TestCase
{
    public function testLabel()
    {
        $field = Text::make('Name')->get();
        $this->assertSame('Name', $field['label']);
    }

    public function testName()
    {
        $field = Text::make('Email')->get();
        $this->assertSame('email', $field['name']);

        $field = Text::make('Category Tag', 'category_tag')->get();
        $this->assertSame('category_tag', $field['name']);
    }

    public function testKey()
    {
        $field = Text::make('Phone')->get();
        $this->assertSame('field_16217cde', $field['key']);
    }

    public function testType()
    {
        $field = Text::make('Text')->get();
        $this->assertSame('text', $field['type']);
    }

    public function testWithSettings()
    {
        $field = Text::make('Text With Settings')->withSettings(['custom' => 'setting'])->get();
        $this->assertSame('setting', $field['custom']);

        $this->expectException(InvalidArgumentException::class);

        Text::make('Text With Settings Label')->withSettings(['label' => 'invalid'])->get();
    }

    public function testReadOnly()
    {
        $field = Text::make('Text Read Only')->readOnly()->get();
        $this->assertTrue($field['readonly']);
    }

    public function testRequired()
    {
        $field = Text::make('Title')->required()->get();
        $this->assertTrue($field['required']);
    }

    public function testDisabled()
    {
        $field = Text::make('Text Disabled')->disabled()->get();
        $this->assertTrue($field['disabled']);
    }

    public function testInstructions()
    {
        $field = Text::make('Heading')->instructions('Add the text content')->get();
        $this->assertSame('Add the text content', $field['instructions']);
    }

    public function testPlaceholder()
    {
        $field = Text::make('Placeholder')->placeholder('ACF')->get();
        $this->assertSame('ACF', $field['placeholder']);
    }

    public function testWrapper()
    {
        $field = Text::make('Status')->wrapper(['id' => 'status'])->get();
        $this->assertSame(['id' => 'status'], $field['wrapper']);
    }

    public function testConditionalLogicExternalGroup()
    {
        $field = Text::make('Conditional Logic External Group')
            ->conditionalLogic([
                ConditionalLogic::where(
                    group: 'external',
                    name: 'type',
                    operator: '==empty',
                )
            ])->get('group');
        $this->assertSame('field_21649737', $field['conditional_logic'][0][0]['field']);
    }

    public function testConditionalLogicAnd()
    {
        $field = Text::make('Conditional Logic And')
            ->conditionalLogic([
                ConditionalLogic::where('type', '==', 'video')->and('highlight', '!=', 'true')
            ])->get('group');

        $this->assertSame('==', $field['conditional_logic'][0][0]['operator']);
        $this->assertSame('!=', $field['conditional_logic'][0][1]['operator']);
    }

    public function testConditionalLogic()
    {
        $field = Text::make('Conditional Logic')
            ->conditionalLogic([
                ConditionalLogic::where('type', '==empty'),
            ])
            ->conditionalLogic([
                ConditionalLogic::where('title', '==contains', 'ACF'),
            ]);

        $field = $field->get('group');

        $this->assertSame('==empty', $field['conditional_logic'][0][0]['operator']);
        $this->assertSame('==contains', $field['conditional_logic'][1][0]['operator']);
    }

    public function testPrepend()
    {
        $field = Text::make('Prepend')->prepend('prefix')->get();
        $this->assertSame('prefix', $field['prepend']);
    }

    public function testAppend()
    {
        $field = Text::make('Append')->append('suffix')->get();
        $this->assertSame('suffix', $field['append']);
    }

    public function testDump()
    {
        $log = [];

        VarDumper::setHandler(function ($value) use (&$log) {
            $log[] = $value;
        });

        Text::make('Dump')->dump(1, 2);

        $this->assertSame([['label' => 'Dump', 'name' => 'dump', 'type' => 'text', 'key' => 'field_076f7d8c'], 1, 2], $log);

        VarDumper::setHandler(null);
    }
}
