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
use WordPlate\Acf\Fields\WysiwygEditor;

class WysiwygEditorTest extends TestCase
{
    public function testType()
    {
        $field = WysiwygEditor::make('Wysiwyg Editor')->toArray();
        $this->assertSame('wysiwyg', $field['type']);
    }

    public function testMediaUpload()
    {
        $field = WysiwygEditor::make('Wysiwyg Editor Media Upload')->mediaUpload(false)->toArray();
        $this->assertFalse($field['media_upload']);
    }

    public function testTabs()
    {
        $field = WysiwygEditor::make('Wysiwyg Editor Tabs')->tabs('visual')->toArray();
        $this->assertSame('visual', $field['tabs']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument tabs [test].');

        $field = WysiwygEditor::make('Wysiwyg Editor Inavlid Tabs')->tabs('test')->toArray();
    }

    public function testToolbar()
    {
        $field = WysiwygEditor::make('Wysiwyg Editor Toolbar')->toolbar('basic')->toArray();
        $this->assertSame('basic', $field['toolbar']);
    }
}
