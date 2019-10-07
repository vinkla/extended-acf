<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Number;

class NumberTest extends TestCase
{
    public function testType()
    {
        $field = Number::make('Number')->toArray();
        $this->assertSame('number', $field['type']);
    }

    public function testMax()
    {
        $field = Number::make('Max')->max(10)->toArray();
        $this->assertSame(10, $field['max']);
    }

    public function testMin()
    {
        $field = Number::make('Min')->min(5)->toArray();
        $this->assertSame(5, $field['min']);
    }
}
