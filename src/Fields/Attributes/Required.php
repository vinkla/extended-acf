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
 * This is the required trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait Required
{
    /**
     * Set the field as required.
     *
     * @return self
     */
    public function required(): self
    {
        $this->config->set('required', true);

        return $this;
    }
}
