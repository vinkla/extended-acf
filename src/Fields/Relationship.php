<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\FilterBy;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Relationship extends Field
{
    use FilterBy, Instructions, MinMax, Required, ReturnFormat, Wrapper;

    protected $type = 'relationship';

    public function elements(array $elements): self
    {
        $this->config->set('elements', $elements);

        return $this;
    }

    public function filters(array $filters): self
    {
        $this->config->set('filters', $filters);

        return $this;
    }
}
