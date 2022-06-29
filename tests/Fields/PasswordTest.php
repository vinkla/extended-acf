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

use Extended\ACF\Fields\Password;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    public function testType()
    {
        $field = Password::make('Password')->get();
        $this->assertSame('password', $field['type']);
    }
}
