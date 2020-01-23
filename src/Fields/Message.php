<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\NewLines;

class Message extends Field
{
    use NewLines;

    /**
     * @var string
     */
    protected $type = 'message';

    /**
     * Set the message content.
     *
     * @param string $message
     *
     * @return self
     */
    public function message(string $message): self
    {
        $this->config->set('message', $message);

        return $this;
    }

    /**
     * Enable escaped HTML.
     *
     * @return self
     */
    public function escapeHtml(): self
    {
        $this->config->set('esc_html', true);

        return $this;
    }
}
