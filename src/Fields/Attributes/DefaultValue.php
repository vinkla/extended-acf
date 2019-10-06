<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait DefaultValue
{
    public function defaultValue($value): self
    {
        $this->config->set('default_value', $value);

        return $this;
    }
}
