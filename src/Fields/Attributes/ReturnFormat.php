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

trait ReturnFormat
{
    /** @throws \InvalidArgumentException */
    public function returnFormat(string $format): self
    {
        if (!in_array($format, ['array', 'id', 'label', 'object', 'url', 'value'])) {
            throw new InvalidArgumentException("Invalid argument return format [$format].");
        }

        $this->config->set('return_format', $format);

        return $this;
    }
}
