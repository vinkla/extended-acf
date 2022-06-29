<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\Oembed;
use PHPUnit\Framework\TestCase;

class OembedTest extends TestCase
{
    public function testType()
    {
        $field = Oembed::make('Oembed')->get();
        $this->assertSame('oembed', $field['type']);
    }

    public function testHeight()
    {
        $field = Oembed::make('Oembed Height')->height(100)->get();
        $this->assertSame(100, $field['height']);
    }

    public function testWidth()
    {
        $field = Oembed::make('Oembed Width')->width(200)->get();
        $this->assertSame(200, $field['width']);
    }
}
