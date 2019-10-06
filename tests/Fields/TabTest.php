<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Tab;

class TabTest extends TestCase
{
    public function testType()
    {
        $field = Tab::make('Tab')->toArray();
        $this->assertSame('tab', $field['type']);
    }

    public function testPlacement()
    {
        $field = Tab::make('Tab Placement')->placement('top')->toArray();
        $this->assertSame('top', $field['placement']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument placement [test].');

        Tab::make('Invalid Tab Placement')->placement('test')->toArray();
    }
}
