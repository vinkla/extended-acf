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
 * This is the wrapper trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait Wrapper
{
    /**
     * Set the wrapper id, class and/or width.
     *
     * @param array $wrapper
     *
     * @return self
     */
    public function wrapper(array $wrapper): self
    {
        $this->config->set('wrapper', $wrapper);

        return $this;
    }
}
