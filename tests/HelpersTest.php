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

namespace WordPlate\Tests;

use PHPUnit\Framework\TestCase;

/**
 * This is the helpers test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class HelpersTest extends TestCase
{
    protected function assertFieldType($type, $settings)
    {
        $this->assertSame($type, $settings['type']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAcfFieldMissingName()
    {
        acf_text(['label']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAcfFieldMissingLabel()
    {
        acf_text(['name']);
    }

    public function testAcfText()
    {
        $this->assertFieldType('text', acf_text([
            'name' => 'test',
            'label' => 'test',
        ]));
    }
}
