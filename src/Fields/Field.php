<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Config;
use WordPlate\Acf\Key;

abstract class Field
{
    protected $config;

    public function __construct(string $label, string $name = null)
    {
        $this->config = new Config([
            'label' => $label,
            'name' => $name ?? sanitize_title($label),
            'type' => $this->type,
        ]);
    }

    public static function make(string $label, string $name = null): self
    {
        return new static($label, $name);
    }

    public function instructions(string $instructions): self
    {
        $this->config->set('instructions', $instructions);

        return $this;
    }

    public function required(): self
    {
        $this->config->set('required', true);

        return $this;
    }

    public function toArray(): array
    {
        $this->config->set('key', Key::generate($this->config->get('name'), 'field'));

        return $this->config->all();
    }
}
