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
 * This is the group class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Group
{
    /**
     * The config array.
     *
     * @var \WordPlate\Acf\Config
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
        $this->config = new Config($config, ['title', 'fields']);
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
        $key = str_replace('-', '_', sanitize_title($key));

        $key = str_replace('group_', '', $key);

        $this->key = $key;
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
