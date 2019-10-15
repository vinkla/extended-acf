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
 * This is the multiple trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait Multiple
{
    /**
     * Enable multiple values.
     *
     * @return self
     */
    public function multiple(): self
    {
        $this->config->set('multiple', true);

        return $this;
    }
}
