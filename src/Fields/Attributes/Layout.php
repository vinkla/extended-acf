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

        $key = __CLASS__ === 'WordPlate\Acf\Fields\Layout' ? 'display' : 'layout';

        $this->config->set($key, $layout);

        return $this;
    }
}
