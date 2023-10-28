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

use Extended\ACF\Fields\WYSIWYGEditor;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\DefaultValue;
use Extended\ACF\Tests\Fields\Settings\Instructions;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class WYSIWYGEditorTest extends FieldTestCase
{
    use ConditionalLogic;
    use DefaultValue;
    use Instructions;
    use Required;
    use Wrapper;

    public string $field = WYSIWYGEditor::class;
    public string $type = 'wysiwyg';

    public function testDisableMediaUpload()
    {
        $field = WYSIWYGEditor::make('Media Upload')->disableMediaUpload()->get();
        $this->assertFalse($field['media_upload']);
    }

    public function testLazyLoad()
    {
        $field = WYSIWYGEditor::make('Lazy Load')->lazyLoad()->get();
        $this->assertTrue($field['delay']);
    }

    public function testTabs()
    {
        $field = WYSIWYGEditor::make('Tabs')->tabs('visual')->get();
        $this->assertSame('visual', $field['tabs']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument tabs [test].');

        $field = WYSIWYGEditor::make('Invalid Tabs')->tabs('test')->get();
    }

    public function testToolbar()
    {
        $field = WYSIWYGEditor::make('Toolbar')->toolbar('basic')->get();
        $this->assertSame('basic', $field['toolbar']);

        $field = WYSIWYGEditor::make('Toolbar Array')->toolbar(['bold', 'italic'])->get();
        $this->assertSame('bold_italic', $field['toolbar']);
    }
}
