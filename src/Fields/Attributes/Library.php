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

use InvalidArgumentException;

trait Library
{
    /**
     * Set the library property.
     *
     * @param string $library
     *
     * @return self
     */
    public function library(string $library): self
    {
        if (!in_array($library, ['all', 'uploadedTo'])) {
            throw new InvalidArgumentException("Invalid argument library [$library].");
        }

        $this->config->set('library', $library);

        return $this;
    }
}
