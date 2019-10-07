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

trait MinMax
{
    public function max(int $max): self
    {
        $this->config->set('max', $max);

        return $this;
    }

    public function min(int $min): self
    {
        $this->config->set('min', $min);

        return $this;
    }
}
