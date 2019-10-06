<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait DateTimeFormat
{
    public function displayFormat(string $format): self
    {
        $this->config->set('display_format', $format);

        return $this;
    }

    public function returnFormat(string $format): self
    {
        $this->config->set('return_format', $format);

        return $this;
    }
}
