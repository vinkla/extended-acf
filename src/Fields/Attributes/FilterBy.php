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

namespace WordPlate\Acf\Fields\Attributes;

/**
 * This is the filter by trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
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
