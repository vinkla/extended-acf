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
 * This is the file size trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait FileSize
{
    /**
     * Set the minimum and maximum file size.
     *
     * @param int|string $min
     * @param int|string $max
     *
     * @return self
     */
    public function fileSize($min = null, $max  = null): self
    {
        if ($min !== null) {
            $this->config->set('min_size', $min);
        }

        if ($max !== null) {
            $this->config->set('max_size', $max);
        }

        return $this;
    }
}
