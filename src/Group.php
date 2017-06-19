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

use Illuminate\Support\Str;
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
     * The group keys.
     *
     * @var array
     */
    protected static $keys = [];

    /**
     * Create a new group instance.
     *
     * @param array $settings
     *
     * @return void
     */
    public function __construct(array $settings)
    {
        $this->settings = $settings;

        $this->setKey($settings['key'] ?? $settings['title']);
    }

    /**
     * Set the group key.
     *
     * @param string $key
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function setKey(string $key)
    {
        $key = Str::lower($key);

        if (!Str::startsWith($key, 'group_')) {
            $key = sprintf('group_%s', $key);
        }

        $key = Str::snake($key);

        if (in_array($key, self::$keys)) {
            throw new InvalidArgumentException("The group key [$key] is not unique.");
        }

        self::$keys[] = $key;

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
            $field = new Field($this, $field);

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
        $settings = [
            'key' => $this->getKey(),
            'fields' => $this->getFields(),
        ];

        return array_merge($this->settings, $settings);
    }
}
