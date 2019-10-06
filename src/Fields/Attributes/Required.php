<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Required
{
    public function required(): self
    {
        $this->config->set('required', true);

        return $this;
    }
}
