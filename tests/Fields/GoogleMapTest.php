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

use Extended\ACF\Fields\GoogleMap;
use PHPUnit\Framework\TestCase;

class GoogleMapTest extends TestCase
{
    public function testType()
    {
        $field = GoogleMap::make('Google Map')->get();
        $this->assertSame('google_map', $field['type']);
    }

    public function testCenter()
    {
        $field = GoogleMap::make('Google Map Center')->center(11.11, 22.22)->get();
        $this->assertSame(11.11, $field['center_lat']);
        $this->assertSame(22.22, $field['center_lng']);
    }

    public function testZoom()
    {
        $field = GoogleMap::make('Google Map Zoom')->zoom(14)->get();
        $this->assertSame(14, $field['zoom']);
    }
}
