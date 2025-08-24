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

use Extended\ACF\Fields\Settings\Affixable;
use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\DefaultValue;
use Extended\ACF\Fields\Settings\Disabled;
use Extended\ACF\Fields\Settings\HelperText;
use Extended\ACF\Fields\Settings\Immutable;
use Extended\ACF\Fields\Settings\Placeholder;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Wrapper;

class Email extends Field
{
    use Affixable;
    use ConditionalLogic;
    use DefaultValue;
    use Disabled;
    use HelperText;
    use Immutable;
    use Placeholder;
    use Required;
    use Wrapper;

    protected ?string $type = 'email';
}
