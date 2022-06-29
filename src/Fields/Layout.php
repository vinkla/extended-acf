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

use Extended\ACF\Fields\Settings\Layout as Display;
use Extended\ACF\Fields\Settings\MinMax;
use Extended\ACF\Fields\Settings\SubFields;

class Layout extends Field
{
    use Display;
    use MinMax;
    use SubFields;

    protected string $keyPrefix = 'layout';
}
