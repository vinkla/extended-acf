<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Config;

/**
 * This is the config test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
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
