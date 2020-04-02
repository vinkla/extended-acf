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

namespace WordPlate\Tests\Acf\Fields\Attributes;

trait Endpoint
{
    public function testEndpoint()
    {
        $label = $this->getLabel('Endpoint');
        $field = $this->field::make($label)->endpoint()->toArray();
        $this->assertTrue($field['endpoint']);
    }
}
