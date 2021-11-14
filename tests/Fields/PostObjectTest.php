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

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\PostObject;

class PostObjectTest extends TestCase
{
    public function testType()
    {
        $field = PostObject::make('Post Object')->getSettings();
        $this->assertSame('post_object', $field['type']);
    }

    public function testMultiple()
    {
        $field = PostObject::make('Post Object Multiple')->allowMultiple()->getSettings();
        $this->assertTrue($field['multiple']);
    }

    public function testAllowNull()
    {
        $field = PostObject::make('Post Object Nullable')->allowNull()->getSettings();
        $this->assertTrue($field['allow_null']);
    }

    public function testPostTypes()
    {
        $field = PostObject::make('Post Object Filter Post Type')->postTypes(['page'])->getSettings();
        $this->assertSame(['page'], $field['post_type']);
    }

    public function testTaxonomies()
    {
        $field = PostObject::make('Post Object Filter Taxonomy')->taxonomies(['category:untitled'])->getSettings();
        $this->assertSame(['category:untitled'], $field['taxonomy']);
    }
}
