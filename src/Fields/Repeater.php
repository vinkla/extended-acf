<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\ButtonLabel;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Layout;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\SubFields;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Repeater extends Field
{
    use ButtonLabel, Instructions, Layout, MinMax, SubFields, Required, Wrapper;

    protected $type = 'repeater';

    // TODO: Add collapsed property.
}
