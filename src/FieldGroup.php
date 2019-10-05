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

        $this->config = new Config($config);
    }

    public function toArray(): array
    {
        if (!$this->config->has('style')) {
            $this->config->set('style', 'seamless');
        }

        $key = Key::sanitize($this->config->get('title'));

        $this->config->set('key', Key::generate($key, 'group'));

        return $this->config->all();
    }
}
