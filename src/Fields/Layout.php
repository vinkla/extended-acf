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

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\Layout as Display;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\SubFields;

class Layout extends Field
{
    use Display;
    use MinMax;
    use SubFields;

    /**
     * The layout's key prefix.
     *
     * @var string
     */
    protected $keyPrefix = 'layout';
}
