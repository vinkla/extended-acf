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

namespace Extended\ACF\Fields;

use Extended\ACF\Fields\Settings\MinMax;
use Extended\ACF\Fields\Settings\SubFields;
use InvalidArgumentException;

class Layout extends Field
{
    use MinMax;
    use SubFields;

    protected string $keyPrefix = 'layout';

    /**
     * @param string $layout block, row, table
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
}
