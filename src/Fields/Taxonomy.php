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
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\Nullable;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\ReturnFormat;
use Extended\ACF\Fields\Settings\Wrapper;
use InvalidArgumentException;

class Taxonomy extends Field
{
    use ConditionalLogic;
    use Instructions;
    use Nullable;
    use Required;
    use ReturnFormat;
    use Wrapper;

    protected string|null $type = 'taxonomy';

    /**
     * @param string $fieldType checkbox, multi_select, select, radio
     * @throws \InvalidArgumentException
     */
    public function appearance(string $fieldType): static
    {
        if (!in_array($fieldType, ['checkbox', 'multi_select', 'select', 'radio'])) {
            throw new InvalidArgumentException("Invalid argument field type [$fieldType].");
        }

        $this->settings['field_type'] = $fieldType;

        return $this;
    }

    public function addTerm(bool $addTerm = true): static
    {
        $this->settings['add_term'] = $addTerm;

        return $this;
    }

    public function loadTerms(bool $loadTerms = true): static
    {
        $this->settings['load_terms'] = $loadTerms;

        return $this;
    }

    public function saveTerms(bool $saveTerms = true): static
    {
        $this->settings['save_terms'] = $saveTerms;

        return $this;
    }

    public function taxonomy(string $taxonomy): static
    {
        $this->settings['taxonomy'] = $taxonomy;

        return $this;
    }
}
