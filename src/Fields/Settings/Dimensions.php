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

trait Dimensions
{
    public function maxHeight(int $max): static
    {
        $this->settings['max_height'] = $max;

        return $this;
    }

    public function minHeight(int $min): static
    {
        $this->settings['min_height'] = $min;

        return $this;
    }

    public function maxWidth(int $max): static
    {
        $this->settings['max_width'] = $max;

        return $this;
    }

    public function minWidth(int $min): static
    {
        $this->settings['min_width'] = $min;

        return $this;
    }
}
