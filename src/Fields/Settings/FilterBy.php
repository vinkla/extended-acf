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
    /**
     * @param string[] $postStatus draft, future, pending, private, publish
     * @throws \InvalidArgumentException
     */
    public function postStatus(array|string $postStatus): static
    {
        if (is_string($postStatus)) {
            $postStatus = [$postStatus];
        }

        if (count(array_diff($postStatus, ['draft', 'future', 'pending', 'private', 'publish'])) > 0) {
            throw new InvalidArgumentException('Invalid argument post status.');
        }

        $this->settings['post_status'] = $postStatus;

        return $this;
    }

    public function postTypes(array|string $postTypes): static
    {
        if (is_string($postTypes)) {
            $postTypes = [$postTypes];
        }

        $this->settings['post_type'] = $postTypes;

        return $this;
    }

    public function taxonomies(array $taxonomies): static
    {
        if (is_string($taxonomies)) {
            $taxonomies = [$taxonomies];
        }

        $this->settings['taxonomy'] = $taxonomies;

        return $this;
    }
}
