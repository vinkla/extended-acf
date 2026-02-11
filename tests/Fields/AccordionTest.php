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

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\Accordion;
use Extended\ACF\Tests\Fields\Settings\Endpoint;
use Extended\ACF\Tests\Fields\Settings\HelperText;

class AccordionTest extends FieldTestCase
{
    use Endpoint;
    use HelperText;

    public string $field = Accordion::class;
    public string $type = 'accordion';

    public function testMultiExpand()
    {
        $field = Accordion::make('Multi Expand')->multiExpand()->toArray();
        $this->assertTrue($field['multi_expand']);
    }

    public function testOpen()
    {
        $field = Accordion::make('Open')->open()->toArray();
        $this->assertTrue($field['open']);
    }
}
