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

trait Bidirectional
{
    /**
     * Create a bidirectional relationship between two or more fields. This requires setting a custom key for each
     * related field using the `key` method and passing the keys of those related fields to this method.
     * @see https://www.advancedcustomfields.com/resources/bidirectional-relationships/
     */
    public function bidirectional(array|string $keys): static
    {
        $this->settings['bidirectional'] = 1;
        $this->settings['bidirectional_target'] = is_array($keys) ? $keys : [$keys];

        return $this;
    }
}
