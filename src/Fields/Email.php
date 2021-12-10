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
use WordPlate\Acf\Fields\Settings\Disabled;
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\Pending;
use WordPlate\Acf\Fields\Settings\Placeholder;
use WordPlate\Acf\Fields\Settings\Writable;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\Wrapper;
use WordPlate\Acf\Fields\Settings\DefaultValue;

class Email extends Field
{
    use ConditionalLogic;
    use Disabled;
    use Instructions;
    use Pending;
    use Placeholder;
    use Required;
    use Wrapper;
    use Writable;
    use DefaultValue;

    protected string|null $type = 'email';
}
