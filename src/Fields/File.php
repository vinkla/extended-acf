<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\Library;
use WordPlate\Acf\Fields\Attributes\MimeTypes;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;

class File extends Text
{
    use Library, MimeTypes, ReturnFormat;

    protected $type = 'file';

    public function size($min, $max): self
    {
        $this->config->set('min_size', $min);
        $this->config->set('max_size', $max);

        return $this;
    }
}
