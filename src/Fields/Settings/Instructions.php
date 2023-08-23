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

namespace Extended\ACF\Fields\Settings;

trait Instructions
{
    /**
     * @param string $text The Markdown elements supported include `<a>`, `<code>`, `<em>`, and `<strong>`.
     * @see https://wordpress.com/support/markdown-quick-reference/
     */
    public function instructions(string $text): static
    {
        // Replace emphasis formatting: *text* or _text_ => <em>text</em>
        $text = preg_replace('/\*\*(.*?)\*\*|__(.*?)__/', '<strong>$1$2</strong>', $text);

        // Replace strong formatting: **text** or __text__ => <strong>text</strong>
        $text = preg_replace('/\*(.*?)\*|_(.*?)_/', '<em>$1$2</em>', $text);

        // Replace <code> formatting: `code` => <code>code</code>
        $text = preg_replace('/\`(.*?)\`/', '<code>$1</code>', $text);

        // Replace link formatting: [text](url) => <a href="url">text</a>
        $text = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2">$1</a>', $text);

        $this->settings['instructions'] = $text;

        return $this;
    }
}
