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

trait Dimensions
{
    public function height(?int $min = null, ?int $max = null): static
    {
        if ($min !== null) {
            $this->settings['min_height'] = $min;
        }

        if ($max !== null) {
            $this->settings['max_height'] = $max;
        }

        return $this;
    }

    public function width(?int $min = null, ?int $max = null): static
    {
        if ($min !== null) {
            $this->settings['min_width'] = $min;
        }

        if ($max !== null) {
            $this->settings['max_width'] = $max;
        }

        return $this;
    }
}
