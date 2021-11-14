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
use WordPlate\Acf\Fields\File;

class FileTest extends TestCase
{
    public function testType()
    {
        $field = File::make('File')->getSettings();
        $this->assertSame('file', $field['type']);
    }

    public function testMimeTypes()
    {
        $field = File::make('Mime Types')->mimeTypes(['jpg', 'pdf'])->getSettings();
        $this->assertSame('jpg,pdf', $field['mime_types']);
    }

    public function testReturnFormat()
    {
        $field = File::make('Return Format')->returnFormat('array')->getSettings();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument return format [test].');

        File::make('Invalid Return Format')->returnFormat('test')->getSettings();
    }

    public function testFileSize()
    {
        $field = File::make('File Size')->fileSize('400 KB', 5)->getSettings();
        $this->assertSame('400 KB', $field['min_size']);
        $this->assertSame(5, $field['max_size']);

        $field = File::make('Min File Size')->fileSize(10)->getSettings();
        $this->assertArrayNotHasKey('max_size', $field);

        $field = File::make('Max File Size')->fileSize(null, 20)->getSettings();
        $this->assertArrayNotHasKey('min_size', $field);
    }
}
