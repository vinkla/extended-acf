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
use WordPlate\Acf\Fields\Range;

class RangeTest extends TestCase
{
    public function testType()
    {
        $field = Range::make('Range')->get();
        $this->assertSame('range', $field['type']);
    }

    public function testStep()
    {
        $field = Range::make('Range Step')->step(5.2)->get();
        $this->assertSame(5.2, $field['step']);
    }
}
