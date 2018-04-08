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

use WordPlate\Acf\Config\Repository;

/**
 * This is the group class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Group
{
    /**
     * The config repository.
     *
     * @var \WordPlate\Acf\Config\Repository
     */
    protected $config;

    /**
     * The group key.
     *
     * @var string
     */
    protected $key;

    /**
     * Create a new group instance.
     *
     * @param array $config
     *
     * @return void
     */
    public function __construct(array $config)
    {
        $this->config = new Repository($config, ['title', 'fields']);
    }

    /**
     * Set the group key.
     *
     * @param string $key
     *
     * @return void
     */
    public function setKey(string $key): void
    {
        $this->key = str_replace('group_', '', Key::sanitize($key));
    }

    /**
     * Get the group key.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Get the group fields.
     *
     * @return array
     */
    public function getFields(): array
    {
        $fields = [];

        foreach ($this->config->get('fields') as $field) {
            $field->setParentKey($this->getKey());

            $fields[] = $field->toArray();
        }

        return $fields;
    }

    /**
     * Return the group as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $key = Key::generate('group', $this->getKey());

        $config = [
            'key' => $key,
            'fields' => $this->getFields(),
        ];

        return array_merge($this->config->toArray(), $config);
    }
}
