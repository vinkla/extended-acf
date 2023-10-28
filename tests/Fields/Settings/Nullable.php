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

trait Nullable
{
    public function testNullable()
    {
        $field = $this->make('Nullable')->nullable()->get();
        $this->assertTrue($field['allow_null']);
    }
}
