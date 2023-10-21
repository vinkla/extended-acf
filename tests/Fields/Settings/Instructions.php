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

namespace Extended\ACF\Tests\Fields\Settings;

trait Instructions
{
    public function testInstructions()
    {
        $field = $this->field::make($this->label('Instructions'))->instructions('text **strong** *italic* __strong__ _italic_ `code` [link](https://advancedcustomfields.com/)')->get();
        $this->assertSame('text <strong>strong</strong> <em>italic</em> <strong>strong</strong> <em>italic</em> <code>code</code> <a href="https://advancedcustomfields.com/">link</a>', $field['instructions']);
    }
}
