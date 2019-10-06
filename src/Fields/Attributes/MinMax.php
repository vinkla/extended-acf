<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait MinMax
{
    public function max(int $max): self
    {
        $this->config->set('max', $max);

        return $this;
    }

    public function min(int $min): self
    {
        $this->config->set('min', $min);

        return $this;
    }
}
