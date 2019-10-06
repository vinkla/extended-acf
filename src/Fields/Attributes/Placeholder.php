<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Placeholder
{
    public function placeholder(string $placeholder): self
    {
        $this->config->set('placeholder', $placeholder);

        return $this;
    }
}
