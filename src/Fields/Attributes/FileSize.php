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

trait FileSize
{
    /**
     * @param int|string|null $min
     * @param int|string|null $max
     */
    public function fileSize($min = null, $max = null): self
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
