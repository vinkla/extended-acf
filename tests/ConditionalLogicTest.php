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
use WordPlate\Acf\ConditionalLogic;

/**
 * This is the conditional logic test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class ConditionalLogicTest extends TestCase
{
    public function testGreaterThan()
    {
        $logic = ConditionalLogic::if('age')->greaterThan(10);
        $logic->setParentKey('field');

        $this->assertSame('>', $logic->toArray()['operator']);
        $this->assertSame(10, $logic->toArray()['value']);
    }

    public function testLessThan()
    {
        $logic = ConditionalLogic::if('age')->lessThan(10);
        $logic->setParentKey('field');

        $this->assertSame('<', $logic->toArray()['operator']);
        $this->assertSame(10, $logic->toArray()['value']);
    }

    public function testEquals()
    {
        $logic = ConditionalLogic::if('age')->equals(18);
        $logic->setParentKey('field');

        $this->assertSame('==', $logic->toArray()['operator']);
        $this->assertSame(18, $logic->toArray()['value']);
    }

    public function testNotEquals()
    {
        $logic = ConditionalLogic::if('age')->notEquals(18);
        $logic->setParentKey('field');

        $this->assertSame('!=', $logic->toArray()['operator']);
        $this->assertSame(18, $logic->toArray()['value']);
    }

    public function testContains()
    {
        $logic = ConditionalLogic::if('age')->contains(20);
        $logic->setParentKey('field');

        $this->assertSame('==contains', $logic->toArray()['operator']);
        $this->assertSame(20, $logic->toArray()['value']);
    }

    public function testEmpty()
    {
        $logic = ConditionalLogic::if('age')->empty();
        $logic->setParentKey('field');

        $this->assertSame('==empty', $logic->toArray()['operator']);
    }

    public function testNotEmpty()
    {
        $logic = ConditionalLogic::if('age')->notEmpty();
        $logic->setParentKey('field');

        $this->assertSame('!=empty', $logic->toArray()['operator']);
    }
}
