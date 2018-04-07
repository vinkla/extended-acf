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
 * This is the layout class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Layout
{
    /**
     * The config array.
     *
     * @var \WordPlate\Acf\Config
     */
    protected $config;

    /**
     * The parent field key.
     *
     * @var string
     */
    protected $parentKey;

    /**
     * Create a new layout instance.
     *
     * @param array $config
     *
     * @return void
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config, ['label', 'name']);
    }

    /**
     * Set the field parent key.
     *
     * @return void
     */
    public function setParentKey(string $parentKey): void
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
        $name = str_replace('-', '_', sanitize_title($this->config->get('name')));

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

        foreach ($this->config->get('sub_fields') as $field) {
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
        $config = [
            'key' => Key::generate('layout', $this->getKey()),
        ];

        if ($this->config->has('sub_fields')) {
            $config['sub_fields'] = $this->getSubFields();
        }

        return array_merge($this->config->toArray(), $config);
    }
}
