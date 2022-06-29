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

use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Text;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class GroupTest extends TestCase
{
    public function testType()
    {
        $field = Group::make('Group')->get();
        $this->assertSame('group', $field['type']);
    }

    public function testFields()
    {
        $field = Group::make('Group Fields')
            ->fields([
                Text::make('Title'),
            ])
            ->get();

        $this->assertSame('Title', $field['sub_fields'][0]['label']);
    }

    public function testLayout()
    {
        $field = Group::make('Group Layout')->layout('block')->get();
        $this->assertSame('block', $field['layout']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument layout [test].');

        Group::make('Invalid Group Layout')->layout('test')->get();
    }
}
