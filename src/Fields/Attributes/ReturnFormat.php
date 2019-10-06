<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

use InvalidArgumentException;

trait ReturnFormat
{
    public function returnFormat(string $format): self
    {
        if (!in_array($format, ['array', 'id', 'url'])) {
            throw new InvalidArgumentException("Invalid return format [$format].");
        }

        $this->config->set('return_format', $format);

        return $this;
    }
}
