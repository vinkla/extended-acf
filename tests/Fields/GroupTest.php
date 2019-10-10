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

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Group;

class GroupTest extends TestCase
{
    public function testType()
    {
        $field = Group::make('Group')->toArray();
        $this->assertSame('group', $field['type']);
    }

    public function testFields()
    {
        $field = Group::make('Group Fields')->fields([])->toArray();
        $this->assertSame([], $field['sub_fields']);
    }

    public function testLayout()
    {
        $field = Group::make('Group Layout')->layout('block')->toArray();
        $this->assertSame('block', $field['layout']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument layout [test].');

        Group::make('Invalid Group Layout')->layout('test')->toArray();
    }
}
