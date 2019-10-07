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
use WordPlate\Acf\Fields\Oembed;

class OembedTest extends TestCase
{
    public function testType()
    {
        $field = Oembed::make('Oembed')->toArray();
        $this->assertSame('oembed', $field['type']);
    }

    public function testHeight()
    {
        $field = Oembed::make('Oembed Height')->height(100)->toArray();
        $this->assertSame(100, $field['height']);
    }

    public function testWidth()
    {
        $field = Oembed::make('Oembed Width')->width(200)->toArray();
        $this->assertSame(200, $field['width']);
    }
}
