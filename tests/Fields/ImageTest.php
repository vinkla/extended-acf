<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\Image;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function testType()
    {
        $field = Image::make('Image')->get();
        $this->assertSame('image', $field['type']);
    }

    public function testPreviewSize()
    {
        $field = Image::make('Preview Size')->previewSize('large')->get();
        $this->assertSame('large', $field['preview_size']);
    }

    public function testLibrary()
    {
        $field = Image::make('Library')->library('all')->get();
        $this->assertSame('all', $field['library']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument library [test].');

        Image::make('Invalid Library')->library('test')->get();
    }
}
