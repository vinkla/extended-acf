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

use InvalidArgumentException;

trait Library
{
    /** @throws \InvalidArgumentException */
    public function library(string $library): self
    {
        if (!in_array($library, ['all', 'uploadedTo'])) {
            throw new InvalidArgumentException("Invalid argument library [$library].");
        }

        $this->config->set('library', $library);

        return $this;
    }
}
