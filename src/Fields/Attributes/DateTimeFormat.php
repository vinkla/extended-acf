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

trait DateTimeFormat
{
    public function displayFormat(string $format): self
    {
        $this->config->set('display_format', $format);

        return $this;
    }

    public function returnFormat(string $format): self
    {
        $this->config->set('return_format', $format);

        return $this;
    }
}
