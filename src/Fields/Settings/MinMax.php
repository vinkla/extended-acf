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

trait MinMax
{
    public function max(float $max): static
    {
        $this->settings['max'] = $max;

        return $this;
    }

    public function min(float $min): static
    {
        $this->settings['min'] = $min;

        return $this;
    }
}
