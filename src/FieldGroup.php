<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf;

use InvalidArgumentException;

/**
 * This is the field group class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class FieldGroup
{
    /**
     * The field group's config.
     *
     * @var \WordPlate\Acf\Config
     */
    protected $config;

    /**
     * Create a new field group instance.
     *
     * @param array $config
     *
     * @return void
     */
    public function __construct(array $config)
    {
        $requiredKeys = ['title', 'fields', 'location'];

        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing field group configuration key [$key].");
            }
        }

        $this->config = new Config($config);
    }

    /**
     * Return the field group config as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $key = Key::sanitize($this->config->get('title'));

        if (!$this->config->has('style')) {
            $this->config->set('style', 'seamless');
        }

        $this->config->set('fields', array_map(function ($field) use ($key) {
            $field->setParentKey($key);

            return $field->toArray();
        }, $this->config->get('fields')));

        $this->config->set('location', array_map(function ($location) {
            return $location->toArray();
        }, $this->config->get('location')));

        $this->config->set('key', Key::generate($key, 'group'));

        return $this->config->all();
    }
}
