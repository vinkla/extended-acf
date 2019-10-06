<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Text extends Field
{
    use Instructions, Required, Wrapper;

    protected $type = 'text';
}
