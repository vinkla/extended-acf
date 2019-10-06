<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\Choices;

class ButtonGroup extends Text
{
    use Choices;

    protected $type = 'button_group';
}
