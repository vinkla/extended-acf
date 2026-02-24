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

trait WeekDay
{
    public function testFirstDayOfWeek()
    {
        $field = $this->make('First Day Of Week')->firstDayOfWeek(1)->toArray();
        $this->assertSame(1, $field['first_day']);
    }

    public function testWeekStartsOnMonday()
    {
        $field = $this->make('Week Starts On Monday')->weekStartsOnMonday()->toArray();
        $this->assertSame(1, $field['first_day']);
    }

    public function testWeekStartsOnSunday()
    {
        $field = $this->make('Week Starts On Sunday')->weekStartsOnSunday()->toArray();
        $this->assertSame(0, $field['first_day']);
    }
}
