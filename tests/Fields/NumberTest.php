<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Number;

class NumberTest extends TestCase
{
    public function testType()
    {
        $field = Number::make('Number')->getSettings();
        $this->assertSame('number', $field['type']);
    }

    public function testMax()
    {
        $field = Number::make('Max')->max(10)->getSettings();
        $this->assertSame(10, $field['max']);
    }

    public function testMin()
    {
        $field = Number::make('Min')->min(5)->getSettings();
        $this->assertSame(5, $field['min']);
    }
}
