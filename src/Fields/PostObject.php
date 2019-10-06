<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\FilterBy;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Multiple;
use WordPlate\Acf\Fields\Attributes\Nullable;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class PostObject extends Field
{
    use FilterBy, Instructions, Multiple, Nullable, Required, ReturnFormat, Wrapper;

    protected $type = 'post_object';
}
