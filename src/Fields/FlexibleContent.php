<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\ButtonLabel;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class FlexibleContent extends Field
{
    use ButtonLabel, Instructions, MinMax, Required, Wrapper;

    protected $type = 'flexible_content';

    public function layouts(array $layouts): self
    {
        $this->config->set('layouts', $layouts);

        // TODO: Add indexed keys for layouts.

        return $this;
    }
}
