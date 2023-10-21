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

use Extended\ACF\Fields\File;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    public function testType()
    {
        $field = File::make('File')->get();
        $this->assertSame('file', $field['type']);
    }

    public function testAcceptedFileTypes()
    {
        $field = File::make('File Accepted File Types')->acceptedFileTypes(['image/jpg', 'application/pdf'])->get();
        $this->assertSame('image/jpg,application/pdf', $field['mime_types']);
    }

    public function testReturnFormat()
    {
        $field = File::make('Return Format')->returnFormat('array')->get();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument return format [test].');

        File::make('Invalid Return Format')->returnFormat('test')->get();
    }

    public function testMinSize()
    {
        $field = File::make('File Min Size')->minSize('400 KB')->get();
        $this->assertSame('400 KB', $field['min_size']);
    }

    public function testMaxSize()
    {
        $field = File::make('File Max Size')->maxSize(5)->get();
        $this->assertSame(5, $field['max_size']);
    }
}
