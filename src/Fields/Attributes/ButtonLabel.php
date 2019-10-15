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
 * This is the button label trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait ButtonLabel
{
    /**
     * Set the button label text.
     *
     * @param string $label
     *
     * @return self
     */
    public function buttonLabel(string $label): self
    {
        $this->config->set('button_label', $label);

        return $this;
    }
}
