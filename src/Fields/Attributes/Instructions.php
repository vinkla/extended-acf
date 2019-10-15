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

/**
 * This is the instructions trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait Instructions
{
    /**
     * Set the field instructions text.
     *
     * @param string $instructions
     *
     * @return self
     */
    public function instructions(string $instructions): self
    {
        $this->config->set('instructions', $instructions);

        return $this;
    }
}
