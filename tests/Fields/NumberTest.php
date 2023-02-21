<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\Number;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    public function testType()
    {
        $field = Number::make('Number')->get();
        $this->assertSame('number', $field['type']);
    }

    public function testMax()
    {
        $field = Number::make('Max')->max(10.5)->get();
        $this->assertSame(10.5, $field['max']);
    }

    public function testMin()
    {
        $field = Number::make('Min')->min(5.5)->get();
        $this->assertSame(5.5, $field['min']);
    }
}
