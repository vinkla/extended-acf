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

namespace WordPlate\Acf\Fields\Settings;

trait FilterBy
{
    public function postTypes(array $postTypes): static
    {
        $this->settings['post_type'] = $postTypes;

        return $this;
    }

    public function taxonomies(array $taxonomies): static
    {
        $this->settings['taxonomy'] = $taxonomies;

        return $this;
    }
}
