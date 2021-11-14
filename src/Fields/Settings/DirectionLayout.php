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

trait DirectionLayout
{
    /**
     * @param string $layout vertical or horizontal
     * @throws \InvalidArgumentException
     */
    public function layout(string $layout): static
    {
        if (!in_array($layout, ['vertical', 'horizontal'])) {
            throw new InvalidArgumentException("Invalid argument layout [$layout].");
        }

        $this->settings['layout'] = $layout;

        return $this;
    }
}
