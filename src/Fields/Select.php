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

use Extended\ACF\Fields\Settings\Choices;
use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\DefaultValue;
use Extended\ACF\Fields\Settings\Disabled;
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\Multiple;
use Extended\ACF\Fields\Settings\Nullable;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\ReturnFormat;
use Extended\ACF\Fields\Settings\Wrapper;
use Extended\ACF\Fields\Settings\Writable;

class Select extends Field
{
    use Choices;
    use DefaultValue;
    use Disabled;
    use ConditionalLogic;
    use Instructions;
    use Multiple;
    use Nullable;
    use Required;
    use ReturnFormat;
    use Wrapper;
    use Writable;

    protected string|null $type = 'select';

    public function stylisedUi(bool $useAjax = false): static
    {
        $this->settings['ui'] = true;
        $this->settings['ajax'] = $useAjax;

        return $this;
    }
}
