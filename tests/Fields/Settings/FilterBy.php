<?php

/**
 * Copyright (c) Vincent Klaiber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields\Settings;

use InvalidArgumentException;

trait FilterBy
{
    public function testPostStatus()
    {
        $field = $this->make('Post Status')->postStatus(['publish'])->toArray();
        $this->assertSame(['publish'], $field['post_status']);

        $this->expectException(InvalidArgumentException::class);
        $this->make('Invalid Post Status')->postStatus(['invalid'])->toArray();
    }

    public function testPostTypes()
    {
        $field = $this->make('Filter Post Type')->postTypes(['page'])->toArray();
        $this->assertSame(['page'], $field['post_type']);
    }

    public function testTaxonomies()
    {
        $field = $this->make('Filter Taxonomy')->taxonomies(['category:untitled'])->toArray();
        $this->assertSame(['category:untitled'], $field['taxonomy']);
    }
}
