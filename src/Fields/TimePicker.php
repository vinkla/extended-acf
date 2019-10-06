<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\DateTimeFormat;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class TimePicker extends Field
{
    use DateTimeFormat, Instructions, Required, Wrapper;

    protected $type = 'time_picker';
}
