<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Multiple;
use WordPlate\Acf\Fields\Attributes\Nullable;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class User extends Field
{
    use Instructions, Multiple, Nullable, Required, ReturnFormat, Wrapper;

    protected $type = 'user';

    public function filterByRole(array $roles): self
    {
        $this->config->set('role', $roles);

        return $this;
    }
}
