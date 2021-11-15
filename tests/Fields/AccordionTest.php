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
use WordPlate\Acf\Fields\Accordion;

class AccordionTest extends TestCase
{
    public function testType()
    {
        $field = Accordion::make('Accordion')->get();
        $this->assertSame('accordion', $field['type']);
    }

    public function testEndpoint()
    {
        $field = Accordion::make('Accordion Endpoint')->endpoint()->get();
        $this->assertTrue($field['endpoint']);
    }

    public function testMultiExpand()
    {
        $field = Accordion::make('Accordion Multi Expand')->multiExpand()->get();
        $this->assertTrue($field['multi_expand']);
    }

    public function testOpen()
    {
        $field = Accordion::make('Accordion Open')->open()->get();
        $this->assertTrue($field['open']);
    }
}
