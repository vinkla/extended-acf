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

use Extended\ACF\Fields\Settings\Choices;
use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\DefaultValue;
use Extended\ACF\Fields\Settings\Disabled;
use Extended\ACF\Fields\Settings\HelperText;
use Extended\ACF\Fields\Settings\Immutable;
use Extended\ACF\Fields\Settings\Multiple;
use Extended\ACF\Fields\Settings\Nullable;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Wrapper;
use InvalidArgumentException;

class Select extends Field
{
    use Choices;
    use ConditionalLogic;
    use DefaultValue;
    use Disabled;
    use HelperText;
    use Immutable;
    use Multiple;
    use Nullable;
    use Required;
    use Wrapper;

    protected string|null $type = 'select';

    public function stylized(): static
    {
        $this->settings['ui'] = true;

        return $this;
    }

    public function lazyLoad(): static
    {
        $this->settings['ui'] = true;
        $this->settings['ajax'] = true;

        return $this;
    }

    public function create(): static
    {
        $this->settings['ui'] = true;
        $this->settings['multiple'] = true;
        $this->settings['create_options'] = true;

        return $this;
    }

    public function save(): static
    {
        $this->settings['ui'] = true;
        $this->settings['multiple'] = true;
        $this->settings['create_options'] = true;
        $this->settings['save_options'] = true;

        return $this;
    }

    /**
     * @param string $format array, label, value
     * @throws \InvalidArgumentException
     */
    public function format(string $format): static
    {
        if (!in_array($format, ['array', 'label', 'value'])) {
            throw new InvalidArgumentException("Invalid argument format [$format].");
        }

        $this->settings['return_format'] = $format;

        return $this;
    }
}
