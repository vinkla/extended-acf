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

trait Layout
{
    public function testLayout()
    {
        $field = $this->make('Layout')->layout('block')->get();
        $this->assertSame('block', $field['layout']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument layout [test].');

        $this->make('Invalid Layout')->layout('test')->get();
    }
}
