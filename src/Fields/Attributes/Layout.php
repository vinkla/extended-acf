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

trait Layout
{
    /** @throws \InvalidArgumentException */
    public function layout(string $layout): self
    {
        if (!in_array($layout, ['block', 'row', 'table'])) {
            throw new InvalidArgumentException("Invalid argument layout [$layout].");
        }

        $key = __CLASS__ === 'WordPlate\Acf\Fields\Layout' ? 'display' : 'layout';

        $this->config->set($key, $layout);

        return $this;
    }
}
