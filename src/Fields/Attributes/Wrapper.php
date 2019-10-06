<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Wrapper
{
    public function wrapper(array $wrapper): self
    {
        $this->config->set('wrapper', $wrapper);

        return $this;
    }

    public function width(int $width): self
    {
        $wrapper = $this->config->get('wrapper', []);

        $this->wrapper(array_merge($wrapper, [
            'width' => $width,
        ]));

        return $this;
    }
}
