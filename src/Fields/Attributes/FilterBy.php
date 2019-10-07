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

trait FilterBy
{
    public function filterByPostType(array $postTypes): self
    {
        $this->config->set('post_type', $postTypes);

        return $this;
    }

    public function filterByTaxonomy(array $taxonomies): self
    {
        $this->config->set('taxonomy', $taxonomies);

        return $this;
    }
}
