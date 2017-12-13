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

namespace WordPlate\Acf;

/**
 * This is the conditional class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Conditional
{
    /**
     * The groups array.
     *
     * @var array
     */
    protected $groups;

    /**
     * The groups array.
     *
     * @var array
     */
    protected $field;

    /**
     * The parent field key.
     *
     * @var string
     */
    protected $parentKey;

    /**
     * Create a new conditional instance.
     *
     * @param array $groups
     * @param string $parentKey
     *
     * @return void
     */
    public function __construct(array $groups, array $field, string $parentKey)
    {
        $this->groups = $groups;
        $this->field = $field;
        $this->parentKey = $parentKey;
    }

    /**
     * Return the conditional as array.
     *
     * @return array
     */
    public function toArray() : array
    {
        $groups = [];

        foreach ($this->groups as $group) {
            $fieldName = sprintf('_%s', $this->field['name']);
            $parent = str_replace($fieldName, '', $this->parentKey);

            $name = str_replace('-', '_', sanitize_title($group['name']));

            $field = sprintf('%s_%s', $parent, $name);

            $group = [
                'field' => $field,
                'operator' => $group['operator'],
                'value' => $group['value'],
            ];

            $groups[] = $group;
        }

        return $groups;
    }
}
