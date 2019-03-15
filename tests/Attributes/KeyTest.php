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

namespace WordPlate\Tests\Acf\Attributes;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Attributes\Key;

/**
 * This is the key test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class KeyTest extends TestCase
{
    public function testGenerate()
    {
        $key = Key::generate('block_image', 'layout');

        $this->assertSame('layout_2f1c419c', $key);
    }

    public function testValidateUnique()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The key [layout_cef90b6c] is not unique.');

        Key::generate('video', 'layout');
        Key::generate('video', 'layout');
    }

    public function testValidatePrefix()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The key must be prefixed with [layout].');

        Key::validate('video', 'layout');
    }

    public function testSanitize()
    {
        $this->assertSame('group_test', Key::sanitize('GROUP-TEST'));
    }

    public function testHash()
    {
        $this->assertSame('b35135fa', Key::hash('image'));
    }
}
