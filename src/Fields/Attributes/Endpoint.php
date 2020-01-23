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

trait Endpoint
{
    /**
     * Define an endpoint for the previous tabs to stop.
     *
     * @return self
     */
    public function endpoint(): self
    {
        $this->config->set('endpoint', true);

        return $this;
    }
}
