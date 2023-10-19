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

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\PostObject;
use PHPUnit\Framework\TestCase;

class PostObjectTest extends TestCase
{
    public function testType()
    {
        $field = PostObject::make('Post Object')->get();
        $this->assertSame('post_object', $field['type']);
    }

    public function testMultiple()
    {
        $field = PostObject::make('Post Object Multiple')->multiple()->get();
        $this->assertTrue($field['multiple']);
    }

    public function testNullable()
    {
        $field = PostObject::make('Post Object Nullable')->nullable()->get();
        $this->assertTrue($field['allow_null']);
    }

    public function testPostTypes()
    {
        $field = PostObject::make('Post Object Filter Post Type')->postTypes(['page'])->get();
        $this->assertSame(['page'], $field['post_type']);
    }

    public function testTaxonomies()
    {
        $field = PostObject::make('Post Object Filter Taxonomy')->taxonomies(['category:untitled'])->get();
        $this->assertSame(['category:untitled'], $field['taxonomy']);
    }
}
