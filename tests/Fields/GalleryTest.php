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

use Extended\ACF\Fields\Gallery;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class GalleryTest extends TestCase
{
    public function testType()
    {
        $field = Gallery::make('Gallery')->get();
        $this->assertSame('gallery', $field['type']);
    }

    public function testInsert()
    {
        $field = Gallery::make('Insert')->insert('prepend')->get();
        $this->assertSame('prepend', $field['insert']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument insert [test]');

        Gallery::make('Invalid Insert')->insert('test')->get();
    }

    public function testMaxHeight()
    {
        $field = Gallery::make('Gallery Max Height')->maxHeight(20)->get();
        $this->assertSame(20, $field['max_height']);
    }

    public function testMinHeight()
    {
        $field = Gallery::make('Gallery Min Height')->minHeight(10)->get();
        $this->assertSame(10, $field['min_height']);
    }

    public function testMaxWidth()
    {
        $field = Gallery::make('Gallery Max Width')->maxWidth(40)->get();
        $this->assertSame(40, $field['max_width']);
    }

    public function testMinWidth()
    {
        $field = Gallery::make('Gallery Min Width')->minWidth(30)->get();
        $this->assertSame(30, $field['min_width']);
    }
}
