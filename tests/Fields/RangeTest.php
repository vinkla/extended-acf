<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Range;

class RangeTest extends TestCase
{
    public function testType()
    {
        $field = Range::make('Range')->toArray();
        $this->assertSame('range', $field['type']);
    }

    public function testStep()
    {
        $field = Range::make('Range Step')->step(5)->toArray();
        $this->assertSame(5, $field['step']);
    }
}
