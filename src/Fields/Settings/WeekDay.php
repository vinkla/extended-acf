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

trait WeekDay
{
    public function firstDayOfWeek(int $day): static
    {
        $this->settings['first_day'] = $day;

        return $this;
    }
}
