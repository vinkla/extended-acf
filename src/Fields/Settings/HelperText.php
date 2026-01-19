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

namespace Extended\ACF\Fields\Settings;

trait HelperText
{
    /**
     * @param string $text The Markdown elements supported include `<a>`, `<code>`, `<em>`, and `<strong>`.
     * @see https://wordpress.com/support/markdown-quick-reference/
     */
    public function helperText(string $text): static
    {
        // Extract code blocks and replace with placeholders
        $codeBlocks = [];
        $text = preg_replace_callback(
            '/\`(.*?)\`/',
            function ($matches) use (&$codeBlocks) {
                $index = count($codeBlocks);
                $codeBlocks[] = '<code>' . $matches[1] . '</code>';
                return '%code' . $index . '%';
            },
            $text,
        );

        // Replace emphasis formatting: *text* or _text_ => <em>text</em>
        $text = preg_replace('/\*\*(.*?)\*\*|__(.*?)__/', '<strong>$1$2</strong>', $text);

        // Replace strong formatting: **text** or __text__ => <strong>text</strong>
        $text = preg_replace('/\*(.*?)\*|_(.*?)_/', '<em>$1$2</em>', $text);

        // Replace link formatting: [text](url) => <a href="url">text</a>
        $text = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2">$1</a>', $text);

        // Restore code blocks
        foreach ($codeBlocks as $index => $code) {
            $text = str_replace('%code' . $index . '%', $code, $text);
        }

        $this->settings['instructions'] = $text;

        return $this;
    }
}
