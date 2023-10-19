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
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\Message;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Wrapper;

class TrueFalse extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use Instructions;
    use Message;
    use Required;
    use Wrapper;

    protected string|null $type = 'true_false';

    public function stylized(string $on = null, string $off = null): static
    {
        $this->settings['ui'] = true;

        if ($on) {
            $this->settings['ui_on_text'] = $on;
        }

        if ($off) {
            $this->settings['ui_off_text'] = $off;
        }

        return $this;
    }
}
