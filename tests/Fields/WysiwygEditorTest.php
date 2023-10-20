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

use Extended\ACF\Fields\WysiwygEditor;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class WysiwygEditorTest extends TestCase
{
    public function testType()
    {
        $field = WysiwygEditor::make('Wysiwyg Editor')->get();
        $this->assertSame('wysiwyg', $field['type']);
    }

    public function testLazyLoad()
    {
        $field = WysiwygEditor::make('Wysiwyg Editor Lazy Load')->lazyLoad()->get();
        $this->assertTrue($field['delay']);
    }

    public function testMediaUpload()
    {
        $field = WysiwygEditor::make('Wysiwyg Editor Media Upload')->mediaUpload(false)->get();
        $this->assertFalse($field['media_upload']);
    }

    public function testTabs()
    {
        $field = WysiwygEditor::make('Wysiwyg Editor Tabs')->tabs('visual')->get();
        $this->assertSame('visual', $field['tabs']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument tabs [test].');

        $field = WysiwygEditor::make('Wysiwyg Editor Invalid Tabs')->tabs('test')->get();
    }

    public function testToolbar()
    {
        $field = WysiwygEditor::make('Wysiwyg Editor Toolbar')->toolbar('basic')->get();
        $this->assertSame('basic', $field['toolbar']);

        $field = WysiwygEditor::make('Wysiwyg Editor Toolbar Array')->toolbar(['bold', 'italic'])->get();
        $this->assertSame('bold_italic', $field['toolbar']);
    }
}
