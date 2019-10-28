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
 * This is the pending trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait Pending
{
    /**
     * Append before the input.
     *
     * @return self
     */
    public function append(string $value): self
    {
        $this->config->set('append', $value);

        return $this;
    }

    /**
     * Prepend before the input.
     *
     * @return self
     */
    public function prepend(string $value): self
    {
        $this->config->set('prepend', $value);

        return $this;
    }
}
