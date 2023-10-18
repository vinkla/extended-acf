<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Fields\Settings;

trait DefaultValue
{
    public function default(mixed $value): static
    {
        $this->settings['default_value'] = $value;

        return $this;
    }

    /** @deprecated This method will be removed in the next major version. Please use `default` instead. */
    public function defaultValue(mixed $value): static
    {
        return $this->default($value);
    }
}
