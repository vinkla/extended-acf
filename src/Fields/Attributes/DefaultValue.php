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
 * This is the default value trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait DefaultValue
{
    /**
     * Set the default value.
     *
     * @param mixed $value
     *
     * @return self
     */
    public function defaultValue($value): self
    {
        $this->config->set('default_value', $value);

        return $this;
    }
}
