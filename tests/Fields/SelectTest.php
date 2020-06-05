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
use WordPlate\Acf\Fields\Select;

class SelectTest extends TestCase
{
    public function testType()
    {
        $field = Select::make('Select Type')->toArray();
        $this->assertSame('select', $field['type']);
    }

    public function testStylisedUi()
    {
        $field = Select::make('Select Stylised UI')->stylisedUi(true)->toArray();
        $this->assertTrue($field['ui']);
        $this->assertTrue($field['ajax']);
    }
}
