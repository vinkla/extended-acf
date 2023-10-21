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

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testType()
    {
        $field = Email::make('Email Address')->get();
        $this->assertSame('email', $field['type']);
    }
}
