<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Instructions
{
    public function instructions(string $instructions): self
    {
        $this->config->set('instructions', $instructions);

        return $this;
    }
}
