<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Fields\Settings;

trait Wrapper
{
    public function wrapper(array $wrapper): static
    {
        $this->settings['wrapper'] = array_merge(
            $this->settings['wrapper'] ?? [],
            $wrapper
        );

        return $this;
    }

    public function column(int|float $width): static
    {
        $this->settings['wrapper']['width'] = $width;

        return $this;
    }
}
