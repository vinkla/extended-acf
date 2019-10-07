<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait SubFields
{
    public function fields(array $fields): self
    {
        $this->config->set('sub_fields', $fields);

        return $this;
    }
}
