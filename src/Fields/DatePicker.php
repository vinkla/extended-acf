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

use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\DateTimeFormat;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\WeekDay;
use WordPlate\Acf\Fields\Attributes\Wrapper;

/**
 * This is the date picker field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class DatePicker extends Field
{
    use ConditionalLogic, DateTimeFormat, Instructions, Required, WeekDay, Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'date_picker';
}
