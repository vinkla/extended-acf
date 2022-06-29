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

use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\Layout;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\SubFields;
use Extended\ACF\Fields\Settings\Wrapper;

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
