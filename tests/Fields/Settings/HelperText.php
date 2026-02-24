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

namespace Extended\ACF\Tests\Fields\Settings;

trait HelperText
{
    public function testInstructions()
    {
        $field = $this->make('Helper Text')->helperText('text **strong** *italic* __strong__ _italic_ `code` [link](https://advancedcustomfields.com/)')->toArray();
        $this->assertSame('text <strong>strong</strong> <em>italic</em> <strong>strong</strong> <em>italic</em> <code>code</code> <a href="https://advancedcustomfields.com/">link</a>', $field['instructions']);
    }

    public function testInstructionsWithMarkdownInsideCode()
    {
        $field = $this->make('Code Example')->helperText('Use `**bold**` for bold text')->get();
        $this->assertSame('Use <code>**bold**</code> for bold text', $field['instructions']);
    }
}
