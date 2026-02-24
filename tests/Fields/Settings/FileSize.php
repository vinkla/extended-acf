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

trait FileSize
{
    public function testMinSize()
    {
        $field = $this->make('Min Size')->minSize('400 KB')->toArray();
        $this->assertSame('400 KB', $field['min_size']);
    }

    public function testMaxSize()
    {
        $field = $this->make('Max Size')->maxSize(5)->toArray();
        $this->assertSame(5, $field['max_size']);
    }
}
