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

trait MaxLength
{
    public function testMaxLength()
    {
        $field = $this->make('Max Length')->maxLength(100)->get();
        $this->assertSame(100, $field['maxlength']);
    }
}
