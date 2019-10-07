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

trait Choices
{
    public function choices(array $choices, $default): self
    {
        $this->config->set('choices', $choices);
        $this->config->set('default_value', $default);

        return $this;
    }
}
