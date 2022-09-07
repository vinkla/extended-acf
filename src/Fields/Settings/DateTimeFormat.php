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

trait DateTimeFormat
{
    /** @see https://wordpress.org/support/article/formatting-date-and-time/ */
    public function displayFormat(string $format): static
    {
        $this->settings['display_format'] = $format;

        return $this;
    }

    /** @see https://wordpress.org/support/article/formatting-date-and-time/ */
    public function returnFormat(string $format): static
    {
        $this->settings['return_format'] = $format;

        return $this;
    }
}
