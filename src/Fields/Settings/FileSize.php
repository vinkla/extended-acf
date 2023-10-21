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

trait FileSize
{
    public function minSize(int|string $size): static
    {
        $this->settings['min_size'] = $size;

        return $this;
    }

    public function maxSize(int|string $size): static
    {
        $this->settings['max_size'] = $size;

        return $this;
    }
}
