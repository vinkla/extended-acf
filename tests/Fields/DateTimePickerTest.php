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

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\DateTimePicker;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\DateTimeFormat;
use Extended\ACF\Tests\Fields\Settings\Disabled;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Immutable;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\WeekDay;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class DateTimePickerTest extends FieldTestCase
{
    use ConditionalLogic;
    use DateTimeFormat;
    use Disabled;
    use HelperText;
    use Immutable;
    use Required;
    use WeekDay;
    use Wrapper;

    public string $field = DateTimePicker::class;
    public string $type = 'date_time_picker';
}
