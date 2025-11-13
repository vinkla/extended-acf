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

namespace Extended\ACF\Fields;

use Extended\ACF\Fields\Settings\Fields;
use InvalidArgumentException;

class Layout extends Field
{
    use Fields;

    protected string $keyPrefix = 'layout';

    /**
     * @param string $layout row, table, block (default)
     * @throws \InvalidArgumentException
     */
    public function layout(string $layout): static
    {
        if (!in_array($layout, ['block', 'row', 'table'])) {
            throw new InvalidArgumentException("Invalid argument layout [$layout].");
        }

        $this->settings['display'] = $layout;

        return $this;
    }

    public function maxInstances(int $count): static
    {
        $this->settings['max'] = $count;

        return $this;
    }

    public function minInstances(int $count): static
    {
        $this->settings['min'] = $count;

        return $this;
    }
}
