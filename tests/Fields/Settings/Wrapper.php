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

trait Wrapper
{
    public function testWrapper()
    {
        $field = $this->field::make($this->label('Status'))->wrapper(['id' => 'status'])->get();
        $this->assertSame(['id' => 'status'], $field['wrapper']);
    }

    public function testColumn()
    {
        $field = $this->field::make($this->label('Column 60'))->column(60)->get();
        $this->assertSame(60, $field['wrapper']['width']);

        $field = $this->field::make($this->label('Column 70'))->wrapper(['width' => 50])->column(70)->get();
        $this->assertSame(70, $field['wrapper']['width']);

        $field = $this->field::make($this->label('Column 80'))->column(50)->wrapper(['width' => 80])->get();
        $this->assertSame(80, $field['wrapper']['width']);

        $field = $this->field::make($this->label('Column 90'))->column(90)->wrapper(['class' => 'column'])->get();
        $this->assertSame(90, $field['wrapper']['width']);
    }
}
