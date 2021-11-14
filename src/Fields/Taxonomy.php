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

use InvalidArgumentException;
use WordPlate\Acf\Fields\Settings\ConditionalLogic;
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\Nullable;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\ReturnFormat;
use WordPlate\Acf\Fields\Settings\Wrapper;

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
     * @param string $fieldType checkbox, multi_select, select or radio
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
