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

use WordPlate\Acf\Fields\Settings\Choices;
use WordPlate\Acf\Fields\Settings\ConditionalLogic;
use WordPlate\Acf\Fields\Settings\DefaultValue;
use WordPlate\Acf\Fields\Settings\Disabled;
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\Multiple;
use WordPlate\Acf\Fields\Settings\Nullable;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\ReturnFormat;
use WordPlate\Acf\Fields\Settings\Wrapper;

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

    protected string|null $type = 'select';

    public function stylisedUi(bool $useAjax = false): static
    {
        $this->settings['ui'] = true;
        $this->settings['ajax'] = $useAjax;

        return $this;
    }
}
