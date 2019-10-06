<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\WYSIWYG;

class WYSIWYGTest extends TestCase
{
    public function testType()
    {
        $field = WYSIWYG::make('WYSIWYG')->toArray();
        $this->assertSame('wysiwyg', $field['type']);
    }

    public function testMediaUpload()
    {
        $field = WYSIWYG::make('WYSIWYG Media Upload')->mediaUpload(false)->toArray();
        $this->assertFalse($field['media_upload']);
    }

    public function testTabs()
    {
        $field = WYSIWYG::make('WYSIWYG Tabs')->tabs('visual')->toArray();
        $this->assertSame('visual', $field['tabs']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument tabs [test].');

        $field = WYSIWYG::make('WYSIWYG Inavlid Tabs')->tabs('test')->toArray();
    }

    public function testToolbar()
    {
        $field = WYSIWYG::make('WYSIWYG Toolbar')->toolbar('basic')->toArray();
        $this->assertSame('basic', $field['toolbar']);
    }
}
