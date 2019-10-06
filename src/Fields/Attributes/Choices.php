<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Choices
{
    public function choices(array $choices, $default): self
    {
        $this->config->set('choices', $choices);
        $this->config->set('default_value', $default);

        return $this;
    }
}
