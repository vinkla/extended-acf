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

use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\DefaultValue;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Message;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class TrueFalse extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use Instructions;
    use Message;
    use Required;
    use Wrapper;

    protected $type = 'true_false';

    public function stylisedUi(?string $onText = null, ?string $offText = null): self
    {
        $this->config->set('ui', true);

        if ($onText !== null) {
            $this->config->set('ui_on_text', $onText);
        }

        if ($offText !== null) {
            $this->config->set('ui_off_text', $offText);
        }

        return $this;
    }
}
