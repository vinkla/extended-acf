<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use InvalidArgumentException;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Textarea extends Field
{
    use Instructions, Required, Wrapper;

    protected $type = 'textarea';

    public function newLines(string $newLines): self
    {
        if (!in_array($newLines, ['br', 'wpautop'])) {
            throw new InvalidArgumentException("Invalid new_lines argument [$newLines].");
        }

        $this->config->set('new_lines', $newLines);

        return $this;
    }
}
