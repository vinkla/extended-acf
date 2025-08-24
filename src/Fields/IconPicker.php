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
use Extended\ACF\Fields\Settings\HelperText;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Wrapper;
use InvalidArgumentException;

class IconPicker extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use HelperText;
    use Required;
    use Wrapper;

    protected ?string $type = 'icon_picker';

    /**
     * @param string $format array, string
     * @throws \InvalidArgumentException
     */
    public function format(string $format): static
    {
        if (!in_array($format, ['array', 'string'])) {
            throw new InvalidArgumentException("Invalid argument format [$format].");
        }

        $this->settings['return_format'] = $format;

        return $this;
    }

    /**
     * @param array $tabs dashicons, media_library, url
     * @throws \InvalidArgumentException
     */
    public function tabs(array $tabs): static
    {
        foreach ($tabs as $tab) {
            if (!in_array($tab, ['dashicons', 'media_library', 'url'])) {
                throw new InvalidArgumentException("Invalid argument tab [$tab].");
            }
        }

        $this->settings['tabs'] = $tabs;

        return $this;
    }
}
