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
use WordPlate\Acf\Fields\Gallery;

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

    public function testHeight()
    {
        $field = Gallery::make('Height')->height(10, 20)->get();
        $this->assertSame(10, $field['min_height']);
        $this->assertSame(20, $field['max_height']);

        $field = Gallery::make('Min Height')->height(30)->get();
        $this->assertArrayNotHasKey('max_height', $field);

        $field = Gallery::make('Max Height')->height(null, 40)->get();
        $this->assertArrayNotHasKey('min_height', $field);
    }

    public function testWidth()
    {
        $field = Gallery::make('Width')->width(10, 20)->get();
        $this->assertSame(10, $field['min_width']);
        $this->assertSame(20, $field['max_width']);

        $field = Gallery::make('Min Width')->width(30)->get();
        $this->assertArrayNotHasKey('max_width', $field);

        $field = Gallery::make('Max Width')->width(null, 40)->get();
        $this->assertArrayNotHasKey('min_width', $field);
    }
}
