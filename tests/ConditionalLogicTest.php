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

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\FieldGroup;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Text;

class ConditionalLogicTest extends TestCase
{
    public function testConditionalLogic()
    {
        $conditionalLogic = [
            'field' => 'field_f5456193',
            'operator' => '==',
            'value' => 10,
        ];

        $this->assertSame($conditionalLogic, ConditionalLogic::where('age', '==', 10)->get('field'));
    }

    public function testInvalidOperator()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid conditional logic operator [wrong].');

        ConditionalLogic::where('age', 'wrong', 10);
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
                                ConditionalLogic::where('select', '==', 'red'),
                            ]),
                    ])
            ],
            'location' => []
        ]);

        $config = $fieldGroup->get();

        $this->assertSame(
            $config['fields'][0]['key'],
            $config['fields'][1]['sub_fields'][0]['conditional_logic'][0][0]['field']
        );
    }
}
