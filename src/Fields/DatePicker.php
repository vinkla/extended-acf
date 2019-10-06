<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\DateTimeFormat;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\WeekDay;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class DatePicker extends Field
{
    use DateTimeFormat, Instructions, Required, WeekDay, Wrapper;

    protected $type = 'date_picker';
}
