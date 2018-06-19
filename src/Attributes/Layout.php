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

use WordPlate\Acf\Config\Repository;
use WordPlate\Acf\Field;

/**
 * This is the layout class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Layout extends Field
{
    /**
     * Create a new layout instance.
     *
     * @param array $config
     *
     * @return void
     */
    public function __construct(array $config)
    {
        $this->config = new Repository($config, ['label', 'name']);
    }

    /**
     * Get the layout key.
     *
     * @return string
     */
    public function getKey(): string
    {
        if ($this->key) {
            return $this->key;
        }

        if ($this->config->has('key')) {
            $key = Key::validate($this->config->get('key'), 'layout');

            $this->key = $key;

            return $this->key;
        }

        $this->key = sprintf(
            '%s_%s',
            $this->parentKey,
            Key::sanitize($this->config->get('name'))
        );

        return $this->key;
    }

    /**
     * Return the layout as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $config = [];

        if (!$this->config->has('key')) {
            $config['key'] = Key::generate($this->getKey(), 'layout');
        }

        if ($this->config->has('sub_fields')) {
            $config['sub_fields'] = $this->getSubFields();
        }

        return array_merge($this->config->toArray(), $config);
    }
}
