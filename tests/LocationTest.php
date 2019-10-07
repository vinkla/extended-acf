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

namespace WordPlate\Tests\Acf;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Location;

/**
 * This is the location test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class LocationTest extends TestCase
{
    public function testIf()
    {
        $location = [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ],
        ];

        $this->assertSame($location, Location::if('post_type', 'post')->toArray());
        $this->assertSame($location, Location::if('post_type', '==', 'post')->toArray());
    }

    public function testAnd()
    {
        $location = [
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ],
            [
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'employee',
            ],
        ];

        $this->assertSame($location, Location::if('post_type', 'post')->and('post_type', 'employee')->toArray());
    }
}
