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
use Extended\ACF\Fields\Settings\Message as MessageAttribute;
use Extended\ACF\Fields\Settings\NewLines;

class Message extends Field
{
    use MessageAttribute;
    use ConditionalLogic;
    use NewLines;

    protected string|null $type = 'message';

    public function escapeHtml(): static
    {
        $this->settings['esc_html'] = true;

        return $this;
    }
}
