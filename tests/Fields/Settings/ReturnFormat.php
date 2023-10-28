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

trait ReturnFormat
{
    public function testReturnFormat()
    {
        $field = $this->make('Return Format')->returnFormat('array')->get();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument return format [test].');

        $this->make('Invalid Return Format')->returnFormat('test')->get();
    }
}
