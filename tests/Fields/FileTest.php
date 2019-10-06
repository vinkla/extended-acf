<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\File;

class FileTest extends TestCase
{
    public function testType()
    {
        $field = File::make('File')->toArray();
        $this->assertSame('file', $field['type']);
    }

    public function testMimeTypes()
    {
        $field = File::make('Mime Types')->mimeTypes(['jpg', 'pdf'])->toArray();
        $this->assertSame('jpg,pdf', $field['mime_types']);
    }

    public function testReturnFormat()
    {
        $field = File::make('Return Format')->returnFormat('array')->toArray();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid return format [test].');

        File::make('Invalid Return Format')->returnFormat('test')->toArray();
    }

    public function testSize()
    {
        $field = File::make('Max Size')->size('400 KB', 5)->toArray();
        $this->assertSame('400 KB', $field['min_size']);
        $this->assertSame(5, $field['max_size']);
    }
}
