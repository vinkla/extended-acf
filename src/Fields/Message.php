<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\NewLines;

/**
 * This is the message field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class Message extends Field
{
    use NewLines;

    /**
     * The field type.
     *
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
