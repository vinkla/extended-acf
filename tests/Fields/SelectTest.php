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

use Extended\ACF\Fields\Select;
use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase
{
    public function testType()
    {
        $field = Select::make('Select Type')->get();
        $this->assertSame('select', $field['type']);
    }

    public function testStylized()
    {
        $field = Select::make('Select Stylized')->stylized()->get();
        $this->assertTrue($field['ui']);
    }

    public function testLazyLoad()
    {
        $field = Select::make('Select Lazy Load')->lazyLoad()->get();
        $this->assertTrue($field['ui']);
        $this->assertTrue($field['ajax']);
    }
}
