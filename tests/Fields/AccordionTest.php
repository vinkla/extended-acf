<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
