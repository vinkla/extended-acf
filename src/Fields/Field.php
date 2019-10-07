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

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Config;
use WordPlate\Acf\Key;

abstract class Field
{
    protected $config;

    protected $parentKey;

    public function __construct(string $label, string $name = null)
    {
        $this->config = new Config([
            'label' => $label,
            'name' => $name ?? sanitize_title($label),
        ]);
    }

    public static function make(string $label, string $name = null): self
    {
        return new static($label, $name);
    }

    public function setParentKey(string $parentKey): void
    {
        $this->parentKey = $parentKey;
    }

    public function toArray(): array
    {
        $this->config->set('type', $this->type);

        $key = sprintf('%s_%s', $this->parentKey, Key::sanitize($this->config->get('name')));
        $this->config->set('key', Key::generate($key, 'field'));

        return $this->config->all();
    }
}
