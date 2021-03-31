<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\FieldGroup;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Location;

class ConditionalLogicTest extends TestCase
{
    public function testGreaterThan()
    {
        $logic = ConditionalLogic::if('age')->greaterThan(10);
        $logic->setParentKey('field');

        $this->assertSame('>', $logic->toArray()['operator']);
        $this->assertSame(10, $logic->toArray()['value']);
    }

    public function testLessThan()
    {
        $logic = ConditionalLogic::if('age')->lessThan(10);
        $logic->setParentKey('field');

        $this->assertSame('<', $logic->toArray()['operator']);
        $this->assertSame(10, $logic->toArray()['value']);
    }

    public function testEquals()
    {
        $logic = ConditionalLogic::if('age')->equals(18);
        $logic->setParentKey('field');

        $this->assertSame('==', $logic->toArray()['operator']);
        $this->assertSame(18, $logic->toArray()['value']);
    }

    public function testNotEquals()
    {
        $logic = ConditionalLogic::if('age')->notEquals(18);
        $logic->setParentKey('field');

        $this->assertSame('!=', $logic->toArray()['operator']);
        $this->assertSame(18, $logic->toArray()['value']);
    }

    public function testContains()
    {
        $logic = ConditionalLogic::if('age')->contains(20);
        $logic->setParentKey('field');

        $this->assertSame('==contains', $logic->toArray()['operator']);
        $this->assertSame(20, $logic->toArray()['value']);
    }

    public function testEmpty()
    {
        $logic = ConditionalLogic::if('age')->empty();
        $logic->setParentKey('field');

        $this->assertSame('==empty', $logic->toArray()['operator']);
    }

    public function testNotEmpty()
    {
        $logic = ConditionalLogic::if('age')->notEmpty();
        $logic->setParentKey('field');

        $this->assertSame('!=empty', $logic->toArray()['operator']);
    }

    public function testResolvedParentKey()
    {
        $fieldGroup = new FieldGroup([
            'title' => 'Resolved Parent Key',
            'fields' => [
                Select::make('Select')
                    ->choices([
                        'red' => 'Red',
                    ])
                    ->defaultValue('red'),
                Repeater::make('Repeater')
                    ->fields([
                        Text::make('Red')
                            ->conditionalLogic([
                                ConditionalLogic::if('select')->equals('red'),
                            ]),
                    ])
            ],
            'location' => []
        ]);

        $config = $fieldGroup->toArray();

        $this->assertSame(
            $config['fields'][0]['key'],
            $config['fields'][1]['sub_fields'][0]['conditional_logic'][0][0]['field']
        );
    }
}
