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

trait Pending
{
    public function append(string $value): self
    {
        $this->config->set('append', $value);

        return $this;
    }

    public function prepend(string $value): self
    {
        $this->config->set('prepend', $value);

        return $this;
    }
}
