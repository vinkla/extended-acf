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
use WordPlate\Acf\Fields\Settings\DateTimeFormat;
use WordPlate\Acf\Fields\Settings\Disabled;
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\Writable;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\WeekDay;
use WordPlate\Acf\Fields\Settings\Wrapper;

class DateTimePicker extends Field
{
    use ConditionalLogic;
    use DateTimeFormat;
    use Disabled;
    use Instructions;
    use Required;
    use WeekDay;
    use Wrapper;
    use Writable;

    protected string|null $type = 'date_time_picker';
}
