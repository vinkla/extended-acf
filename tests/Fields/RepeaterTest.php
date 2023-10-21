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

use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Text;
use PHPUnit\Framework\TestCase;

class RepeaterTest extends TestCase
{
    public function testType()
    {
        $field = Repeater::make('Repeater')->get();
        $this->assertSame('repeater', $field['type']);
    }

    public function testButtonLabel()
    {
        $field = Repeater::make('Repeater Button label')->buttonLabel('Add Item')->get();
        $this->assertSame('Add Item', $field['button_label']);
    }

    public function testCollapsed()
    {
        $field = Repeater::make('Repeater Collapsed')
            ->fields([
                Text::make('Title'),
            ])
            ->collapsed('title')
            ->get();

        $this->assertSame('field_15a7e5e1', $field['collapsed']);
    }

    public function testPagination()
    {
        $field = Repeater::make('Repeater Pagination')->pagination(10)->get();

        $this->assertTrue($field['pagination']);
        $this->assertSame(10, $field['rows_per_page']);
    }
}
