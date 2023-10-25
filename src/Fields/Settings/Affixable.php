<?php

/**
 * Copyright (c) Vincent Klaiber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Fields\Settings;

trait Affixable
{
    public function prefix(string $value): static
    {
        $this->settings['prepend'] = $value;

        return $this;
    }

    public function suffix(string $value): static
    {
        $this->settings['append'] = $value;

        return $this;
    }
}
