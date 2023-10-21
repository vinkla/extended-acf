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

use Extended\ACF\Fields\URL;
use PHPUnit\Framework\TestCase;

class URLTest extends TestCase
{
    public function testType()
    {
        $field = URL::make('URL')->get();
        $this->assertSame('url', $field['type']);
    }

    public function testDefault()
    {
        $field = URL::make('Default')->default('hotpink')->get();
        $this->assertSame('hotpink', $field['default_value']);
    }
}
