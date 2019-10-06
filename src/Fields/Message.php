<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\NewLines;

class Message extends Field
{
    use NewLines;

    protected $type = 'message';

    public function message(string $message): self
    {
        $this->config->set('message', $message);

        return $this;
    }

    public function escapeHtml(): self
    {
        $this->config->set('esc_html', true);

        return $this;
    }
}
