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

namespace Extended\ACF\Fields;

use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\NewLines;

class Message extends Field
{
    use ConditionalLogic;
    use NewLines;

    protected ?string $type = 'message';

    public function body(string $text): static
    {
        // Replace emphasis formatting: *text* or _text_ => <em>text</em>
        $text = preg_replace('/\*\*(.*?)\*\*|__(.*?)__/', '<strong>$1$2</strong>', $text);

        // Replace strong formatting: **text** or __text__ => <strong>text</strong>
        $text = preg_replace('/\*(.*?)\*|_(.*?)_/', '<em>$1$2</em>', $text);

        // Replace <code> formatting: `code` => <code>code</code>
        $text = preg_replace('/\`(.*?)\`/', '<code>$1</code>', $text);

        // Replace link formatting: [text](url) => <a href="url">text</a>
        $text = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2">$1</a>', $text);

        $this->settings['message'] = $text;

        return $this;
    }

    public function escapeHtml(): static
    {
        $this->settings['esc_html'] = true;

        return $this;
    }
}
