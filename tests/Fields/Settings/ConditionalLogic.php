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

namespace Extended\ACF\Tests\Fields\Settings;

trait ConditionalLogic
{
    public function testConditionalLogicExternalGroup()
    {
        $field = $this->field::make($this->label('Conditional Logic External Group'))
            ->conditionalLogic([
                \Extended\ACF\ConditionalLogic::where(
                    group: 'external',
                    name: 'type',
                    operator: '==empty',
                )
            ])->get('group');
        $this->assertSame('field_21649737', $field['conditional_logic'][0][0]['field']);
    }

    public function testConditionalLogicAnd()
    {
        $field = $this->field::make($this->label('Conditional Logic And'))
            ->conditionalLogic([
                \Extended\ACF\ConditionalLogic::where('type', '==', 'video')->and('highlight', '!=', 'true')
            ])->get('group');

        $this->assertSame('==', $field['conditional_logic'][0][0]['operator']);
        $this->assertSame('!=', $field['conditional_logic'][0][1]['operator']);
    }

    public function testConditionalLogic()
    {
        $field = $this->field::make($this->label('Conditional Logic'))
            ->conditionalLogic([
                \Extended\ACF\ConditionalLogic::where('type', '==empty'),
            ])
            ->conditionalLogic([
                \Extended\ACF\ConditionalLogic::where('title', '==contains', 'ACF'),
            ]);

        $field = $field->get('group');

        $this->assertSame('==empty', $field['conditional_logic'][0][0]['operator']);
        $this->assertSame('==contains', $field['conditional_logic'][1][0]['operator']);
    }
}
