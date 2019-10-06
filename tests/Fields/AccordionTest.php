<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Accordion;

class AccordionTest extends TestCase
{
    public function testType()
    {
        $field = Accordion::make('Accordion')->toArray();
        $this->assertSame('accordion', $field['type']);
    }

    public function testEndpoint()
    {
        $field = Accordion::make('Accordion Endpoint')->endpoint()->toArray();
        $this->assertTrue($field['endpoint']);
    }

    public function testMultiExpand()
    {
        $field = Accordion::make('Accordion Multi Expand')->multiExpand()->toArray();
        $this->assertTrue($field['multi_expand']);
    }

    public function testOpen()
    {
        $field = Accordion::make('Accordion Open')->open()->toArray();
        $this->assertTrue($field['open']);
    }
}
