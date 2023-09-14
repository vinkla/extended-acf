<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Fields\Settings;

use InvalidArgumentException;

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

    /**
     * @param string[] $postStatus draft, future, pending, private, publish
     * @throws \InvalidArgumentException
     */
    public function postStatus(array $postStatus): static
    {
        if (count(array_diff($postStatus, ['draft', 'future', 'pending', 'private', 'publish'])) > 0) {
            throw new InvalidArgumentException('Invalid argument post status.');
        }

        $this->settings['post_status'] = $postStatus;

        return $this;
    }
}
