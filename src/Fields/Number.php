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

use WordPlate\Acf\Fields\Settings\ConditionalLogic;
use WordPlate\Acf\Fields\Settings\DefaultValue;
use WordPlate\Acf\Fields\Settings\Disabled;
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\MinMax;
use WordPlate\Acf\Fields\Settings\Pending;
use WordPlate\Acf\Fields\Settings\Placeholder;
use WordPlate\Acf\Fields\Settings\ReadOnly;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\Step;
use WordPlate\Acf\Fields\Settings\Wrapper;

class Number extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use Disabled;
    use Instructions;
    use MinMax;
    use Pending;
    use Placeholder;
    use Step;
    use ReadOnly;
    use Required;
    use Wrapper;

    protected string|null $type = 'number';
}
