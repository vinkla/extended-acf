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

trait Dimensions
{
    public function testMaxHeight()
    {
        $field = $this->make('Max Height')->maxHeight(20)->toArray();
        $this->assertSame(20, $field['max_height']);
    }

    public function testMinHeight()
    {
        $field = $this->make('Min Height')->minHeight(10)->toArray();
        $this->assertSame(10, $field['min_height']);
    }

    public function testMaxWidth()
    {
        $field = $this->make('Max Width')->maxWidth(40)->toArray();
        $this->assertSame(40, $field['max_width']);
    }

    public function testMinWidth()
    {
        $field = $this->make('Min Width')->minWidth(30)->toArray();
        $this->assertSame(30, $field['min_width']);
    }
}
