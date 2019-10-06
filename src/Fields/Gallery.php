<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use InvalidArgumentException;
use WordPlate\Acf\Fields\Attributes\Dimensions;
use WordPlate\Acf\Fields\Attributes\Library;
use WordPlate\Acf\Fields\Attributes\MimeTypes;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;

class Gallery extends Text
{
    use Dimensions, Library, MimeTypes, MinMax, ReturnFormat;

    protected $type = 'gallery';

    public function insert(string $behaviour): self
    {
        if (!in_array($behaviour, ['append', 'prepend'])) {
            throw new InvalidArgumentException("Invalid insert behaviour [$behaviour]");
        }

        $this->config->set('insert', $behaviour);

        return $this;
    }
}
