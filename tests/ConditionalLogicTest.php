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

namespace Extended\Tests\ACF;

use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Select;
use Extended\ACF\Fields\Text;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ConditionalLogicTest extends TestCase
{
    public function testConditionalLogic()
    {
        $conditionalLogic = [
            [
                'field' => 'field_f5456193',
                'operator' => '==',
                'value' => 10,
            ],
        ];

        $this->assertSame($conditionalLogic, ConditionalLogic::where('age', '==', 10)->toArray('field'));
    }

    public function testInvalidOperator()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid conditional logic operator [wrong].');

        ConditionalLogic::where('age', 'wrong', 10);
    }

    public function testResolvedParentKey()
    {
        $settings = register_extended_field_group([
            'title' => 'Resolved Parent Key',
            'fields' => [
                Select::make('Select')
                    ->choices([
                        'red' => 'Red',
                    ])
                    ->default('red'),
                Repeater::make('Repeater')
                    ->fields([
                        Text::make('Red')
                            ->conditionalLogic([
                                ConditionalLogic::where('select', '==', 'red'),
                            ]),
                    ]),
            ],
            'location' => [],
        ]);

        $this->assertSame(
            $settings['fields'][0]['key'],
            $settings['fields'][1]['sub_fields'][0]['conditional_logic'][0][0]['field'],
        );
    }

    public function testFieldKey()
    {
        $settings = register_extended_field_group([
            'title' => 'Field Key',
            'fields' => [
                Select::make('Select')
                    ->key('field_123abc')
                    ->choices(['Red']),
                Text::make('Text')
                    ->conditionalLogic([
                        ConditionalLogic::where(
                            name: 'select',
                            operator: '==',
                            value: 'red',
                            key: 'field_123abc',
                        ),
                    ]),
            ],
            'location' => [],
        ]);

        $this->assertSame(
            'field_123abc',
            $settings['fields'][1]['conditional_logic'][0][0]['field'],
        );
    }
}
