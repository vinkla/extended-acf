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

trait NewLines
{
    public function testNewLines()
    {
        $field = $this->make('Description')->newLines('br')->get();
        $this->assertSame('br', $field['new_lines']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument new lines [test].');

        $this->make('Message')->newLines('test')->get();
    }
}
