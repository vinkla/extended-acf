<?php

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
