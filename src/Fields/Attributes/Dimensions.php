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

trait Dimensions
{
    public function height(int $min, int $max): self
    {
        $this->config->set('min_height', $min);
        $this->config->set('max_height', $max);

        return $this;
    }

    public function width(int $min, int $max): self
    {
        $this->config->set('min_width', $min);
        $this->config->set('max_width', $max);

        return $this;
    }
}
