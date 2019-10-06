<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

class TrueFalse extends Text
{
    protected $type = 'true_false';

    public function ui(): self
    {
        $this->config->set('ui', true);

        return $this;
    }
}
