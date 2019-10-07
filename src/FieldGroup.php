<?php

declare(strict_types=1);

namespace WordPlate\Acf;

use InvalidArgumentException;

class FieldGroup
{
    public function __construct(array $config)
    {
        $requiredKeys = ['title', 'fields', 'location'];

        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $config)) {
                throw new InvalidArgumentException("Missing field group configuration key [$key].");
            }
        }

        $key = Key::sanitize($config['title']);

        $this->config = new Config(array_merge($config, [
            'key' => Key::generate($key, 'group'),
        ]));
    }

    public function toArray(): array
    {
        if (!$this->config->has('style')) {
            $this->config->set('style', 'seamless');
        }

        $this->config->set('fields', array_map(function ($field) {
            return $field->toArray();
        }, $this->config->get('fields', [])));

        $location = $this->config->set('location', array_map(function ($location) {
            return $location->toArray();
        }, $this->config->get('location', [])));

        return $this->config->all();
    }
}
