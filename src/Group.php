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

use InvalidArgumentException;

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
     * The settings array.
     *
     * @var array
     */
    protected $settings;

    /**
     * Create a new group instance.
     *
     * @param array $settings
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function __construct(array $settings)
    {
        $keys = ['title', 'fields'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $settings)) {
                throw new InvalidArgumentException("Missing group setting key [$key].");
            }
        }

        $this->settings = $settings;
    }

    /**
     * Set the group key.
     *
     * @param string $key
     *
     * @return void
     */
    public function setKey(string $key)
    {
        $key = str_replace('-', '_', sanitize_title($key));

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

        foreach ($this->settings['fields'] as $field) {
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

        $settings = [
            'key' => $key,
            'fields' => $this->getFields(),
        ];

        return array_merge($this->settings, $settings);
    }
}
