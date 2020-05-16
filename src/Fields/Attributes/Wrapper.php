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

trait Wrapper
{
    public function wrapper(array $wrapper): self
    {
        $this->config->set('wrapper', $wrapper);

        return $this;
    }
}
