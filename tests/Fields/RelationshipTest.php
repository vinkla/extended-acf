<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Relationship;

class RelationshipTest extends TestCase
{
    public function testType()
    {
        $field = Relationship::make('Relationship')->toArray();
        $this->assertSame('relationship', $field['type']);
    }

    public function testElements()
    {
        $field = Relationship::make('Relationship Elements')->elements(['featured_image'])->toArray();
        $this->assertSame(['featured_image'], $field['elements']);
    }

    public function testFilters()
    {
        $field = Relationship::make('Relationship Filters')->filters(['search'])->toArray();
        $this->assertSame(['search'], $field['filters']);
    }
}
