<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

use InvalidArgumentException;

trait NewLines
{
    /**
     * Set the new lines behaviour.
     *
     * @param string $newLines
     *
     * @return self
     */
    public function newLines(string $newLines): self
    {
        if (!in_array($newLines, ['br', 'wpautop'])) {
            throw new InvalidArgumentException("Invalid argument new lines [$newLines].");
        }

        $this->config->set('new_lines', $newLines);

        return $this;
    }
}
