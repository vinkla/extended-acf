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
 * This is the page class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Page
{
    /**
     * The config array.
     *
     * @var \WordPlate\Acf\Config
     */
    protected $config;

    /**
     * Create a new page instance.
     *
     * @param array $config
     *
     * @return void
     */
    public function __construct(array $config)
    {
        $this->config = new Config($config, ['menu_slug', 'page_title']);
    }

    /**
     * Return the page as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->config->toArray();
    }
}
