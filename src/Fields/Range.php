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

use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\DefaultValue;
use WordPlate\Acf\Fields\Attributes\Disabled;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\Pending;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Step;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Range extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use Disabled;
    use Instructions;
    use MinMax;
    use Step;
    use Pending;
    use Required;
    use Wrapper;

    protected $type = 'range';
}
