<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

namespace WordPlate\Acf;

use InvalidArgumentException;

class FieldGroup
{
    /** @var \WordPlate\Acf\Config */
    protected $config;

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

    public function toArray(): array
    {
        if ($this->config->has('key')) {
            $key = Key::sanitize($this->config->get('key'));
        } else {
            $key = Key::sanitize($this->config->get('title'));
        }

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
