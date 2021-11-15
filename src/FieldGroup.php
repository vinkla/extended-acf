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
    public function __construct(protected array $settings)
    {
        $requiredKeys = ['title', 'fields', 'location'];

        foreach ($requiredKeys as $key) {
            if (!array_key_exists($key, $settings)) {
                throw new InvalidArgumentException("Missing field group setting [$key].");
            }
        }
    }

    /** @internal */
    public function getSettings(): array
    {
        $key = Key::sanitize($this->settings['key'] ?? $this->settings['title']);

        $this->settings['style'] = $this->settings['style'] ?? 'seamless';

        $this->settings['fields'] = array_map(fn ($field) => $field->getSettings($key), $this->settings['fields']);

        $this->settings['location'] = array_map(fn ($location) => $location->getSettings(), $this->settings['location']);

        $this->settings['key'] = Key::generate($key, 'group');

        return $this->settings;
    }
}
