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

namespace WordPlate\Acf\Fields\Attributes;

trait ConditionalLogic
{
    public function conditionalLogic(array $rules): self
    {
        $conditionalLogic = $this->config->get('conditional_logic', []);

        $conditionalLogic[] = $rules;

        $this->config->set('conditional_logic', $conditionalLogic);

        return $this;
    }
}
