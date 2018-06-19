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

use WordPlate\Acf\Attributes\Key;
use WordPlate\Acf\Config\Repository;

/**
 * This is the group class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Group
{
    /**
     * The group key.
     *
     * @var string
     */
    protected $key;

    /**
     * The config repository.
     *
     * @var \WordPlate\Acf\Config\Repository
     */
    protected $config;

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
     * Get the group key.
     *
     * @return string
     */
    public function getKey(): string
    {
        if ($this->key) {
            return $this->key;
        }

        if ($this->config->has('key')) {
            $key = Key::validate($this->config->get('key'), 'group');

            $this->key = $key;

            return $key;
        }

        $this->key = Key::sanitize($this->config->get('title'));

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
        $config = [
            'fields' => $this->getFields(),
        ];

        if ($this->config->has('key')) {
            Key::validate($this->config->get('key'), 'group');
        } else {
            $config['key'] = Key::generate($this->getKey(), 'group');
        }

        return array_merge($this->config->toArray(), $config);
    }
}
