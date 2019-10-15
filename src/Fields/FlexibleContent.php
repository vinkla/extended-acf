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

use WordPlate\Acf\Fields\Attributes\ButtonLabel;
use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

/**
 * This is the flexible content field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class FlexibleContent extends Field
{
    use ButtonLabel, ConditionalLogic, Instructions, MinMax, Required, Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'flexible_content';

    /**
     * Add layouts to flexible content.
     *
     * @param array $layouts
     *
     * @return self
     */
    public function layouts(array $layouts): self
    {
        $this->config->set('layouts', $layouts);

        return $this;
    }
}
