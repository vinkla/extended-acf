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

trait SubFields
{
    /**
     * Add sub fields to the field.
     *
     * @param array $fields
     *
     * @return self
     */
    public function fields(array $fields): self
    {
        $this->config->set('sub_fields', $fields);

        return $this;
    }
}
