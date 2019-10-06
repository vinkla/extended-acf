<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

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
}
