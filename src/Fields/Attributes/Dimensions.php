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

namespace WordPlate\Acf\Fields\Attributes;

trait Dimensions
{
    public function height(?int $min = null, ?int $max = null): self
    {
        if ($min !== null) {
            $this->config->set('min_height', $min);
        }

        if ($max !== null) {
            $this->config->set('max_height', $max);
        }

        return $this;
    }

    public function width(?int $min = null, ?int $max = null): self
    {
        if ($min !== null) {
            $this->config->set('min_width', $min);
        }

        if ($max !== null) {
            $this->config->set('max_width', $max);
        }

        return $this;
    }
}
