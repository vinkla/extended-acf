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

class ColorPicker extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use HelperText;
    use Required;
    use Wrapper;

    protected ?string $type = 'color_picker';

    public function opacity(): static
    {
        $this->settings['enable_opacity'] = true;

        return $this;
    }

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
     * @param string[] $colors hex or rgba values
     * @param string $source themejson, custom
     * @throws \InvalidArgumentException
     */
    public function palette(array $colors = [], string $source = 'custom'): static
    {
        if (!in_array($source, ['custom', 'themejson'])) {
            throw new InvalidArgumentException("Invalid palette source [$source].");
        }

        $this->settings['show_custom_palette'] = 1;
        $this->settings['custom_palette_source'] = $source;

        if ($source === 'custom' && !empty($colors)) {
            $this->settings['palette_colors'] = implode(',', $colors);
        }

        return $this;
    }

    public function disableColorWheel(): static
    {
        $this->settings['show_color_wheel'] = false;

        return $this;
    }
}
