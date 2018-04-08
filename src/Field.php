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

use WordPlate\Acf\Attributes\Conditional;
use WordPlate\Acf\Attributes\Key;
use WordPlate\Acf\Attributes\SubFieldsTrait;
use WordPlate\Acf\Config\Repository;

/**
 * This is the field class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Field
{
    use SubFieldsTrait;

    /**
     * The config repository.
     *
     * @var \WordPlate\Acf\Config\Repository
     */
    protected $config;

    /**
     * The field key.
     *
     * @var string
     */
    protected $key;

    /**
     * The field parent key.
     *
     * @var string
     */
    protected $parentKey;

    /**
     * Create a new field instance.
     *
     * @param array $config
     * @param array $keys
     *
     * @return void
     */
    public function __construct(array $config, array $keys = [])
    {
        $keys = array_merge(['label', 'type'], $keys);

        $this->config = new Repository($config, $keys);
    }

    /**
     * Get the field key.
     *
     * @return string
     */
    public function getKey(): string
    {
        if ($this->key) {
            return $this->key;
        }

        if (in_array($this->getType(), ['accordion', 'message', 'tab'])) {
            $key = $this->config->get('label');
        } else {
            $key = $this->config->get('name');
        }

        $key = sprintf('%s_%s', $this->parentKey, Key::sanitize($key));

        $this->key = $key;

        return $key;
    }

    /**
     * Get the field type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->config->get('type');
    }

    /**
     * Set the field parent key.
     *
     * @param string $parentKey
     *
     * @return void
     */
    public function setParentKey(string $parentKey): void
    {
        $this->parentKey = $parentKey;
    }

    /**
     * Get the conditional logic.
     *
     * @return array
     */
    public function getConditionalLogic(): array
    {
        $conditionals = [];

        foreach ($this->config->get('conditional_logic') as $rules) {
            $conditional = new Conditional($rules, $this->parentKey);

            $conditionals[] = $conditional->toArray();
        }

        return $conditionals;
    }

    /**
     * Get the flexible content layouts.
     *
     * @return array
     */
    public function getLayouts(): array
    {
        $layouts = [];

        foreach ($this->config->get('layouts') as $layout) {
            $layout->setParentKey($this->getKey());

            $layouts[] = $layout->toArray();
        }

        return $layouts;
    }

    /**
     * Return the field as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        $config = [
            'key' => Key::generate('field', $this->getKey()),
        ];

        if ($this->config->has('conditional_logic')) {
            $config['conditional_logic'] = $this->getConditionalLogic();
        }

        if ($this->config->has('layouts')) {
            $config['layouts'] = $this->getLayouts();
        }

        if ($this->config->has('sub_fields')) {
            $config['sub_fields'] = $this->getSubFields();
        }

        return array_merge($this->config->toArray(), $config);
    }
}
