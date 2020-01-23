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

trait Height
{
    /**
     * Set the height.
     *
     * @param int $height
     *
     * @return self
     */
    public function height(int $height): self
    {
        $this->config->set('height', $height);

        return $this;
    }
}
