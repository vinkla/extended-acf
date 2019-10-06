<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

use InvalidArgumentException;

trait NewLines
{
    public function newLines(string $newLines): self
    {
        if (!in_array($newLines, ['br', 'wpautop'])) {
            throw new InvalidArgumentException("Invalid argument new lines [$newLines].");
        }

        $this->config->set('new_lines', $newLines);

        return $this;
    }
}
