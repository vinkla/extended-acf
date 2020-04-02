<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use WordPlate\Acf\Fields\Accordion;
use WordPlate\Tests\Acf\Fields\Attributes\Endpoint;

class AccordionTest extends FieldTestCase
{
    use Endpoint;

    public $field = Accordion::class;

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
