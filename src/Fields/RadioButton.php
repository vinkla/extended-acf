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

namespace Extended\ACF\Fields;

use Extended\ACF\Fields\Settings\Choices;
use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\DefaultValue;
use Extended\ACF\Fields\Settings\DirectionLayout;
use Extended\ACF\Fields\Settings\Disabled;
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\Nullable;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\ReturnFormat;
use Extended\ACF\Fields\Settings\Wrapper;

class RadioButton extends Field
{
    use Choices;
    use ConditionalLogic;
    use DefaultValue;
    use DirectionLayout;
    use Disabled;
    use Instructions;
    use Nullable;
    use Required;
    use ReturnFormat;
    use Wrapper;

    protected string|null $type = 'radio';
}
