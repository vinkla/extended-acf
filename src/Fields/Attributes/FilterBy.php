<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait FilterBy
{
    /**
     * Filter by post types.
     *
     * @param array $postTypes
     *
     * @return self
     */
    public function postTypes(array $postTypes): self
    {
        $this->config->set('post_type', $postTypes);

        return $this;
    }

    /**
     * Filter by taxonomies.
     *
     * @param array $postTypes
     *
     * @return self
     */
    public function taxonomies(array $taxonomies): self
    {
        $this->config->set('taxonomy', $taxonomies);

        return $this;
    }
}
