<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Nullable
{
    public function allowNull(): self
    {
        $this->config->set('allow_null', true);

        return $this;
    }
}
