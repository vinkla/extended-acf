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

namespace WordPlate\Tests\Acf;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Config;

class ConfigTest extends TestCase
{
    public function testGet()
    {
        $config = new Config(['key' => 123]);
        $this->assertSame(123, $config->get('key'));
    }

    public function testHas()
    {
        $config = new Config(['key' => 123]);
        $this->assertTrue($config->has('key'));
    }

    public function testAll()
    {
        $items = ['key' => 123];
        $config = new Config($items);
        $this->assertSame($items, $config->all());
    }
}
