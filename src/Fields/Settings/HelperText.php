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
        $parts = preg_split('/(`[^`]+`)/', $text, -1, PREG_SPLIT_DELIM_CAPTURE);

        foreach ($parts as $i => $part) {
            if (preg_match('/^`.*`$/', $part)) {
                // Convert code blocks without processing markdown inside
                $parts[$i] = '<code>' . substr($part, 1, -1) . '</code>';
            } else {
                // Process markdown formatting
                $part = preg_replace('/\*\*(.*?)\*\*|__(.*?)__/', '<strong>$1$2</strong>', $part);
                $part = preg_replace('/\*(.*?)\*|_(.*?)_/', '<em>$1$2</em>', $part);
                $part = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2">$1</a>', $part);
                $parts[$i] = $part;
            }
        }

        $this->settings['instructions'] = implode('', $parts);

        return $this;
    }
}
