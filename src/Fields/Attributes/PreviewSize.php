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

trait PreviewSize
{
    /**
     * @param string $size thumbnail, medium, medium_large, large or full
     * @return static
     */
    public function previewSize(string $size): self
    {
        $this->config->set('preview_size', $size);

        return $this;
    }
}
