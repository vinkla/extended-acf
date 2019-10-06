<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Endpoint
{
    public function endpoint(): self
    {
        $this->config->set('endpoint', true);

        return $this;
    }
}
