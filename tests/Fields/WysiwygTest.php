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
use WordPlate\Acf\Fields\Wysiwyg;

class WysiwygTest extends TestCase
{
    public function testType()
    {
        $field = Wysiwyg::make('Wysiwyg')->toArray();
        $this->assertSame('wysiwyg', $field['type']);
    }

    public function testMediaUpload()
    {
        $field = Wysiwyg::make('Wysiwyg Media Upload')->mediaUpload(false)->toArray();
        $this->assertFalse($field['media_upload']);
    }

    public function testTabs()
    {
        $field = Wysiwyg::make('Wysiwyg Tabs')->tabs('visual')->toArray();
        $this->assertSame('visual', $field['tabs']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument tabs [test].');

        $field = Wysiwyg::make('Wysiwyg Inavlid Tabs')->tabs('test')->toArray();
    }

    public function testToolbar()
    {
        $field = Wysiwyg::make('Wysiwyg Toolbar')->toolbar('basic')->toArray();
        $this->assertSame('basic', $field['toolbar']);
    }
}
