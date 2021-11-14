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
use WordPlate\Acf\Fields\Settings\DefaultValue;
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\Message;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\Wrapper;

class TrueFalse extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use Instructions;
    use Message;
    use Required;
    use Wrapper;

    protected string|null $type = 'true_false';

    public function stylisedUi(string|null $onText = null, string|null $offText = null): static
    {
        $this->settings['ui'] = true;

        if ($onText !== null) {
            $this->settings['ui_on_text'] = $onText;
        }

        if ($offText !== null) {
            $this->settings['ui_off_text'] = $offText;
        }

        return $this;
    }
}
