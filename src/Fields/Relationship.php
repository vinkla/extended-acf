<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\FilterBy;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

/**
 * This is the relationship field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class Relationship extends Field
{
    use ConditionalLogic, FilterBy, Instructions, MinMax, Required, ReturnFormat, Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'relationship';

    /**
     * Set the selected elements that will be displayed in each result.
     *
     * @param array $elements
     *
     * @return self
     */
    public function elements(array $elements): self
    {
        $this->config->set('elements', $elements);

        return $this;
    }

    /**
     * Set the enabled filters.
     *
     * @param array $filters
     *
     * @return self
     */
    public function filters(array $filters): self
    {
        $this->config->set('filters', $filters);

        return $this;
    }
}
