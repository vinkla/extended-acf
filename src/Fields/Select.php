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

use WordPlate\Acf\Fields\Attributes\Choices;
use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\DefaultValue;
use WordPlate\Acf\Fields\Attributes\Disabled;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Multiple;
use WordPlate\Acf\Fields\Attributes\Nullable;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

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

    protected $type = 'select';

    public function stylisedUi(bool $useAjax = false): self
    {
        $this->config->set('ui', true);
        $this->config->set('ajax', $useAjax);

        return $this;
    }
}
