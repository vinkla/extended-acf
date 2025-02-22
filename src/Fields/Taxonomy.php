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

use Extended\ACF\Fields\Settings\Bidirectional;
use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\HelperText;
use Extended\ACF\Fields\Settings\Nullable;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Wrapper;
use InvalidArgumentException;

class Taxonomy extends Field
{
    use ConditionalLogic;
    use Bidirectional;
    use HelperText;
    use Nullable;
    use Required;
    use Wrapper;

    protected string|null $type = 'taxonomy';

    /**
     * @param string $type checkbox, multi_select, select, radio
     * @throws \InvalidArgumentException
     */
    public function appearance(string $type): static
    {
        if (!in_array($type, ['checkbox', 'multi_select', 'select', 'radio'])) {
            throw new InvalidArgumentException("Invalid argument field type [$type].");
        }

        $this->settings['field_type'] = $type;

        return $this;
    }

    /**
     * @param string $format id, object
     * @throws \InvalidArgumentException
     */
    public function format(string $format): static
    {
        if (!in_array($format, ['id', 'object'])) {
            throw new InvalidArgumentException("Invalid argument format [$format].");
        }

        $this->settings['return_format'] = $format;

        return $this;
    }

    public function create(bool $create = true): static
    {
        $this->settings['add_term'] = $create;

        return $this;
    }

    public function load(bool $load = false): static
    {
        $this->settings['load_terms'] = $load;

        return $this;
    }

    public function save(bool $save = false): static
    {
        $this->settings['save_terms'] = $save;

        return $this;
    }

    public function taxonomy(string $taxonomy): static
    {
        $this->settings['taxonomy'] = $taxonomy;

        return $this;
    }
}
