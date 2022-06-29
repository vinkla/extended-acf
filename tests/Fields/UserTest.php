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

use Extended\ACF\Fields\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testType()
    {
        $field = User::make('User')->get();
        $this->assertSame('user', $field['type']);
    }

    public function testRoles()
    {
        $field = User::make('User Filter Role')->roles(['editor'])->get();
        $this->assertSame(['editor'], $field['role']);
    }
}
