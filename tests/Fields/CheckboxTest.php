<?php

/**
 * Copyright (c) Vincent Klaiber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\Checkbox;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CheckboxTest extends TestCase
{
    public function testType()
    {
        $field = Checkbox::make('Checkbox')->get();
        $this->assertSame('checkbox', $field['type']);
    }

    public function testLayout()
    {
        $field = Checkbox::make('Checkbox Layout')->layout('horizontal')->get();
        $this->assertSame('horizontal', $field['layout']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument layout [test].');

        Checkbox::make('Invalid Checkbox Layout')->layout('test');
    }
}
