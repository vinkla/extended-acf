<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Settings;

use InvalidArgumentException;

trait Layout
{
    /**
     * @param string $layout block, row or table
     * @throws \InvalidArgumentException
     */
    public function layout(string $layout): static
    {
        if (!in_array($layout, ['block', 'row', 'table'])) {
            throw new InvalidArgumentException("Invalid argument layout [$layout].");
        }

        // TODO: Split this into multiple traits.
        $key = __CLASS__ === 'WordPlate\Acf\Fields\Layout' ? 'display' : 'layout';

        $this->settings[$key] = $layout;

        return $this;
    }
}
