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

use Extended\ACF\Fields\Message;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\NewLines;

class MessageTest extends FieldTestCase
{
    use ConditionalLogic;
    use NewLines;

    public string $field = Message::class;
    public string $type = 'message';

    public function testBody()
    {
        $field = Message::make('Body')->body('text **strong** *italic* __strong__ _italic_ `code` [link](https://advancedcustomfields.com/)')->toArray();
        $this->assertSame('text <strong>strong</strong> <em>italic</em> <strong>strong</strong> <em>italic</em> <code>code</code> <a href="https://advancedcustomfields.com/">link</a>', $field['message']);
    }

    public function testEscapeHtml()
    {
        $field = Message::make('Escape HTML')->escapeHtml()->toArray();
        $this->assertTrue($field['esc_html']);
    }
}
