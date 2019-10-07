<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait ButtonLabel
{
    public function buttonLabel(string $label): self
    {
        $this->config->set('button_label', $label);

        return $this;
    }
}
