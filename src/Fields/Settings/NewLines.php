<?php

/**
 * Copyright (c) Vincent Klaiber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Fields\Settings;

use InvalidArgumentException;

trait NewLines
{
    /**
     * @param string $newLines br, wpautop
     * @throws \InvalidArgumentException
     */
    public function newLines(string $newLines): static
    {
        if (!in_array($newLines, ['br', 'wpautop'])) {
            throw new InvalidArgumentException("Invalid argument new lines [$newLines].");
        }

        $this->settings['new_lines'] = $newLines;

        return $this;
    }
}
