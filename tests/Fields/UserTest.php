<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\User;

class UserTest extends TestCase
{
    public function testType()
    {
        $field = User::make('User')->toArray();
        $this->assertSame('user', $field['type']);
    }

    public function testRoles()
    {
        $field = User::make('User Filter Role')->roles(['editor'])->toArray();
        $this->assertSame(['editor'], $field['role']);
    }
}
