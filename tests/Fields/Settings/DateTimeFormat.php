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

trait DateTimeFormat
{
    public function testDisplayFormat()
    {
        $field = $this->make('Display Format')->displayFormat('ymd')->get();
        $this->assertSame('ymd', $field['display_format']);
    }

    public function testReturnFormat()
    {
        $field = $this->make('Return Format')->returnFormat('ymd')->get();
        $this->assertSame('ymd', $field['return_format']);
    }
}
