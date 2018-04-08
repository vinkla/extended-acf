<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf\Attributes;

/**
 * This is the sub fields trait.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
trait SubFieldsTrait
{
    /**
     * Get the sub fields.
     *
     * @return array
     */
    public function getSubFields(): array
    {
        $fields = [];

        foreach ($this->config->get('sub_fields') as $field) {
            $field->setParentKey($this->getKey());

            $fields[] = $field->toArray();
        }

        return $fields;
    }
}
