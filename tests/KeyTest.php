<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Key;

/**
 * This is the key test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class KeyTest extends TestCase
{
    public function testGenerate()
    {
        $key = Key::generate('layout', 'block_image');

        $this->assertSame('layout_2f1c419c', $key);
    }

    public function testKeyUniqueness()
    {
        $this->expectException(InvalidArgumentException::class);

        Key::generate('layout', 'block_image');
    }

    public function testHash()
    {
        $this->assertSame('b35135fa', Key::hash('image'));
    }
}
