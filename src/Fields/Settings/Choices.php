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

use Extended\ACF\Key;

trait Choices
{
    /**
     * It is important to note that a list will be converted to an associative array with keys in snake case. For example, `['Forest Green', 'Sky Blue']` will be converted to `['forest_green' => 'Forest Green', 'sky_blue' => 'Sky Blue']`.
     */
    public function choices(array $choices): static
    {
        if (array_is_list($choices)) {
            $choices = array_combine(array_map(fn ($key) => Key::sanitize($key), $choices), $choices);
        }

        $this->settings['choices'] = $choices;

        return $this;
    }
}
