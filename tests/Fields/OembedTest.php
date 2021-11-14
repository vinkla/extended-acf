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
use WordPlate\Acf\Fields\Oembed;

class OembedTest extends TestCase
{
    public function testType()
    {
        $field = Oembed::make('Oembed')->getSettings();
        $this->assertSame('oembed', $field['type']);
    }

    public function testHeight()
    {
        $field = Oembed::make('Oembed Height')->height(100)->getSettings();
        $this->assertSame(100, $field['height']);
    }

    public function testWidth()
    {
        $field = Oembed::make('Oembed Width')->width(200)->getSettings();
        $this->assertSame(200, $field['width']);
    }
}
