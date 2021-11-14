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

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Tab;

class TabTest extends TestCase
{
    public function testType()
    {
        $field = Tab::make('Tab')->getSettings();
        $this->assertSame('tab', $field['type']);
    }

    public function testPlacement()
    {
        $field = Tab::make('Tab Placement')->placement('top')->getSettings();
        $this->assertSame('top', $field['placement']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument placement [test].');

        Tab::make('Invalid Tab Placement')->placement('test')->getSettings();
    }
}
