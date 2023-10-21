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

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\Tab;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class TabTest extends TestCase
{
    public function testType()
    {
        $field = Tab::make('Tab')->get();
        $this->assertSame('tab', $field['type']);
    }

    public function testPlacement()
    {
        $field = Tab::make('Tab Placement')->placement('top')->get();
        $this->assertSame('top', $field['placement']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument placement [test].');

        Tab::make('Invalid Tab Placement')->placement('test')->get();
    }
}
