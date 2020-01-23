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

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Image;

class ImageTest extends TestCase
{
    public function testType()
    {
        $field = Image::make('Image')->toArray();
        $this->assertSame('image', $field['type']);
    }

    public function testPreviewSize()
    {
        $field = Image::make('Preview Size')->previewSize('large')->toArray();
        $this->assertSame('large', $field['preview_size']);
    }

    public function testLibrary()
    {
        $field = Image::make('Library')->library('all')->toArray();
        $this->assertSame('all', $field['library']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument library [test].');

        Image::make('Invalid Library')->library('test')->toArray();
    }

    public function testHeight()
    {
        $field = Image::make('ImageHeight')->height(10, 20)->toArray();
        $this->assertSame(10, $field['min_height']);
        $this->assertSame(20, $field['max_height']);
    }

    public function testWidth()
    {
        $field = Image::make('ImageWidth')->width(10, 20)->toArray();
        $this->assertSame(10, $field['min_width']);
        $this->assertSame(20, $field['max_width']);
    }

    public function testMinHeight()
    {
        $field = Image::make('ImageMinHeight')->height(10)->toArray();
        $this->assertSame(10, $field['min_height']);
        $this->assertArrayNotHasKey('max_height', $field);
    }

    public function testMinWidth()
    {
        $field = Image::make('ImageMinWidth')->width(10)->toArray();
        $this->assertSame(10, $field['min_width']);
        $this->assertArrayNotHasKey('max_width', $field);
    }

    public function testMaxHeight()
    {
        $field = Image::make('ImageMaxHeight')->height(null, 10)->toArray();
        $this->assertArrayNotHasKey('min_height', $field);
        $this->assertSame(10, $field['max_height']);
    }

    public function testMaxWidth()
    {
        $field = Image::make('ImageMaxWidth')->width(null, 10)->toArray();
        $this->assertArrayNotHasKey('min_width', $field);
        $this->assertSame(10, $field['max_width']);
    }
}
