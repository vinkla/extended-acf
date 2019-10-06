<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\Choices;

class Radio extends Text
{
    use Choices;

    protected $type = 'radio';
}
