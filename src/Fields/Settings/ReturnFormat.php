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

namespace WordPlate\Acf\Fields\Settings;

use InvalidArgumentException;

trait ReturnFormat
{
    /**
     * @param string $format array, id, label, object, url or value
     * @throws \InvalidArgumentException
     */
    public function returnFormat(string $format): static
    {
        if (!in_array($format, ['array', 'id', 'label', 'object', 'url', 'value'])) {
            throw new InvalidArgumentException("Invalid argument return format [$format].");
        }

        $this->settings['return_format'] = $format;

        return $this;
    }
}
