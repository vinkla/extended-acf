<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use InvalidArgumentException;

class Textarea extends Text
{
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
