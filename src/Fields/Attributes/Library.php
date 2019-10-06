<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

use InvalidArgumentException;

trait Library
{
    public function library(string $library): self
    {
        if (!in_array($library, ['all', 'uploadedTo'])) {
            throw new InvalidArgumentException("Invalid library [$library]");
        }

        $this->config->set('library', $library);

        return $this;
    }
}
