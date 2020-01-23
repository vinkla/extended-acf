<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Choices
{
    /**
     * Set the choices array and optional default value.
     *
     * @param array $choices
     *
     * @return self
     */
    public function choices(array $choices): self
    {
        $this->config->set('choices', $choices);

        return $this;
    }
}
