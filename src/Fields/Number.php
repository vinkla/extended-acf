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
use Extended\ACF\Fields\Settings\DefaultValue;
use Extended\ACF\Fields\Settings\Disabled;
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\MinMax;
use Extended\ACF\Fields\Settings\Pending;
use Extended\ACF\Fields\Settings\Placeholder;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Step;
use Extended\ACF\Fields\Settings\Wrapper;
use Extended\ACF\Fields\Settings\Writable;

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
    use Required;
    use Wrapper;
    use Writable;

    protected string|null $type = 'number';
}
