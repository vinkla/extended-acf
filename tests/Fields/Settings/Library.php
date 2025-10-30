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

use InvalidArgumentException;

trait Library
{
    public function testLibrary()
    {
        $field = $this->make('Library')->library('all')->toArray();
        $this->assertSame('all', $field['library']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument library [test].');

        $this->make('Invalid Library')->library('test')->toArray();
    }
}
