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

/**
 * This is the return format trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait ReturnFormat
{
    /**
     * Set the return format.
     *
     * @param string $format
     *
     * @return self
     */
    public function returnFormat(string $format): self
    {
        if (!in_array($format, ['array', 'id', 'object', 'url'])) {
            throw new InvalidArgumentException("Invalid argument return format [$format].");
        }

        $this->config->set('return_format', $format);

        return $this;
    }
}
