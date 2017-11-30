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
 * This is the layout class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Layout
{
    /**
     * The settings array.
     *
     * @var array
     */
    protected $settings;

    /**
     * The parent field key.
     *
     * @var string
     */
    protected $parentKey;

    /**
     * Create a new layout instance.
     *
     * @param array $settings
     * @param string $parentKey
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public function __construct(array $settings)
    {
        $keys = ['label', 'name'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $settings)) {
                throw new InvalidArgumentException("Missing field setting key [$key].");
            }
        }

        $this->settings = $settings;
    }

    /**
     * Set the field parent key.
     *
     * @return void
     */
    public function setParentKey(string $parentKey)
    {
        $this->parentKey = $parentKey;
    }

    /**
     * Get the layout key.
     *
     * @return string
     */
    public function getKey(): string
    {
        $name = str_replace('-', '_', sanitize_title($this->settings['name']));

        return sprintf('%s_%s', $this->parentKey, $name);
    }

    /**
     * Get the sub fields.
     *
     * @return array
     */
    public function getSubFields(): array
    {
        $fields = [];

        foreach ($this->settings['sub_fields'] as $field) {
            $field->setParentKey($this->getKey());

            $fields[] = $field->toArray();
        }

        return $fields;
    }

    /**
     * Return the layout as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $settings = [
            'key' => Key::generate('layout', $this->getKey()),
        ];

        if (isset($this->settings['sub_fields']) && is_array($this->settings['sub_fields'])) {
            $settings['sub_fields'] = $this->getSubFields();
        }

        return array_merge($this->settings, $settings);
    }
}
