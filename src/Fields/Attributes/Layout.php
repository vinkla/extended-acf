<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

use InvalidArgumentException;

trait Layout
{
    public function layout(string $layout): self
    {
        if (!in_array($layout, ['block', 'row', 'table'])) {
            throw new InvalidArgumentException("Invalid argument layout [$layout].");
        }

        $this->config->set('layout', $layout);

        return $this;
    }
}
