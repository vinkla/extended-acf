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

use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\DefaultValue;
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Wrapper;
use InvalidArgumentException;

class ColorPicker extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use Instructions;
    use Required;
    use Wrapper;

    protected string|null $type = 'color_picker';

    public function opacity(): static
    {
        $this->settings['enable_opacity'] = true;

        return $this;
    }

    /**
     * @param string $format array, string
     * @throws \InvalidArgumentException
     */
    public function returnFormat(string $format): static
    {
        if (!in_array($format, ['array', 'string'])) {
            throw new InvalidArgumentException("Invalid argument return format [$format].");
        }

        $this->settings['return_format'] = $format;

        return $this;
    }
}
