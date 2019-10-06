<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Multiple
{
    public function multiple(): self
    {
        $this->config->set('multiple', true);

        return $this;
    }
}
