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

use InvalidArgumentException;

/**
 * This is the page class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Page
{
    /**
     * Create a new page instance.
     *
     * @param array $settings
     *
     * @return void
     */
    public function __construct(array $settings)
    {
        $keys = ['page_title', 'menu_title', 'menu_slug'];

        foreach ($keys as $key) {
            if (!array_key_exists($key, $settings)) {
                throw new InvalidArgumentException("Missing page setting key [$key].");
            }
        }

        $this->settings = $settings;
    }

    /**
     * Return the page as array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->settings;
    }
}
