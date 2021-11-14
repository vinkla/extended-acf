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
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\Layouts\Layout;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\SubFields;
use WordPlate\Acf\Fields\Settings\Wrapper;

class Group extends Field
{
    use ConditionalLogic;
    use Instructions;
    use Layout;
    use SubFields;
    use Required;
    use Wrapper;

    protected string|null $type = 'group';
}
