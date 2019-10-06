<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Step
{
    public function step(int $step): self
    {
        $this->config->set('step', $step);

        return $this;
    }
}
