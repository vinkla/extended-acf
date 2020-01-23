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

/**
 * This is the dimensions trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait Dimensions
{
    /**
     * Set the image min and max height.
     *
     * @param int|null $min
     * @param int|null $max
     *
     * @return self
     */
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

    /**
     * Set the image min and max width.
     *
     * @param int|null $min
     * @param int|null $max
     *
     * @return self
     */
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
