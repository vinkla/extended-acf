<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Settings\Layout as Display;
use WordPlate\Acf\Fields\Settings\MinMax;
use WordPlate\Acf\Fields\Settings\SubFields;

class Layout extends Field
{
    use Display;
    use MinMax;
    use SubFields;

    protected string $keyPrefix = 'layout';
}
