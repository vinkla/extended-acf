<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use InvalidArgumentException;
use WordPlate\Acf\Fields\Attributes\Endpoint;

class Tab extends Field
{
    use Endpoint;

    protected $type = 'tab';

    public function placement(string $placement): self
    {
        if (!in_array($placement, ['left', 'top'])) {
            throw new InvalidArgumentException("Invalid argument placement [$placement].");
        }

        $this->config->set('placement', $placement);

        return $this;
    }
}
