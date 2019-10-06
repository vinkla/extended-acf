<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Height
{
    public function height(int $height): self
    {
        $this->config->set('height', $height);

        return $this;
    }
}
