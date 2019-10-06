<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\PostObject;

class PostObjectTest extends TestCase
{
    public function testType()
    {
        $field = PostObject::make('Post Object')->toArray();
        $this->assertSame('post_object', $field['type']);
    }

    public function testMultiple()
    {
        $field = PostObject::make('Post Object Multiple')->multiple()->toArray();
        $this->assertTrue($field['multiple']);
    }

    public function testAllowNull()
    {
        $field = PostObject::make('Post Object Nullable')->allowNull()->toArray();
        $this->assertTrue($field['allow_null']);
    }

    public function testFilterByPostType()
    {
        $field = PostObject::make('Post Object Filter Post Type')->filterByPostType(['page'])->toArray();
        $this->assertSame(['page'], $field['post_type']);
    }

    public function testFilterByTaxonomy()
    {
        $field = PostObject::make('Post Object Filter Taxonomy')->filterByTaxonomy(['category:untitled'])->toArray();
        $this->assertSame(['category:untitled'], $field['taxonomy']);
    }
}
