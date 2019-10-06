<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\Dimensions;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Library;
use WordPlate\Acf\Fields\Attributes\MimeTypes;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Image extends Field
{
    use Dimensions, Instructions, Library, MimeTypes, Required, ReturnFormat, Wrapper;

    protected $type = 'image';

    public function previewSize(string $size): self
    {
        $this->config->set('preview_size', $size);

        return $this;
    }
}
