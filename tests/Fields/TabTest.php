<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use InvalidArgumentException;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Tests\Acf\Fields\Attributes\Endpoint;

class TabTest extends FieldTestCase
{
    use Endpoint;

    public $field = Tab::class;

    public function testPlacement()
    {
        $field = Tab::make('Tab Placement')->placement('top')->toArray();
        $this->assertSame('top', $field['placement']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument placement [test].');

        Tab::make('Invalid Tab Placement')->placement('test')->toArray();
    }
}
