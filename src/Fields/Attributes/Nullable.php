<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait Nullable
{
    /**
     * Enable nullable values.
     *
     * @return self
     */
    public function allowNull(): self
    {
        $this->config->set('allow_null', true);

        return $this;
    }
}
