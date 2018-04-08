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
    public function __construct(array $groups, string $parentKey)
    {
        $this->groups = $groups;
        $this->parentKey = $parentKey;
    }

    /**
     * Return the conditional as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $groups = [];

        foreach ($this->groups as $group) {
            $key = Key::sanitize($group['name']);

            $key = sprintf('%s_%s', $this->parentKey, $key);

            $group = [
                'field' => sprintf('field_%s', Key::hash($key)),
                'operator' => $group['operator'],
                'value' => $group['value'],
            ];

            $groups[] = $group;
        }

        return $groups;
    }
}
