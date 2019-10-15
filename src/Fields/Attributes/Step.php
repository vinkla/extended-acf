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
 * This is the step trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait Step
{
    /**
     * Set the step number.
     *
     * @param int $step
     *
     * @return self
     */
    public function step(int $step): self
    {
        $this->config->set('step', $step);

        return $this;
    }
}
