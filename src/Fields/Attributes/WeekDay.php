<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait WeekDay
{
    /**
     * Set first day of week.
     *
     * @param int $day
     *
     * @return self
     */
    public function weekStartsOn(int $day): self
    {
        $this->config->set('first_day', $day);

        return $this;
    }
}
