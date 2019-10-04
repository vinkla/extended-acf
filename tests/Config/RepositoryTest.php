<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Config\Repository;

/**
 * This is the config repository test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class RepositoryTest extends TestCase
{
    public function testGet()
    {
        $config = new Repository(['key' => 123]);

        $this->assertSame(123, $config->get('key'));
    }

    public function testRequiredKeys()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Missing configuration key [required].');

        new Repository(['key' => 123], ['required']);
    }

    public function testHas()
    {
        $config = new Repository(['key' => 123]);

        $this->assertTrue($config->has('key'));
    }

    public function testUnset()
    {
        $config = new Repository(['key' => 123]);
        $config->unset('key');

        $this->assertFalse($config->has('key'));
    }

    public function testToArray()
    {
        $items = ['key' => 123];
        $config = new Repository($items);

        $this->assertSame($items, $config->toArray());
    }
}
