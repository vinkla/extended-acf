<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\MinMax;

class Range extends Text
{
    use MinMax;

    protected $type = 'range';
}
