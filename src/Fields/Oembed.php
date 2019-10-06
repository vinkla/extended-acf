<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Oembed extends Field
{
    use Instructions, Required, Wrapper;

    protected $type = 'oembed';

    public function height(int $height): self
    {
        $this->config->set('height', $height);

        return $this;
    }

    public function width(int $width): self
    {
        $this->config->set('width', $width);

        return $this;
    }
}
