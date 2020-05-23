<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Checkbox;

class CheckboxTest extends TestCase
{
    public function testType()
    {
        $field = Checkbox::make('Checkbox')->toArray();
        $this->assertSame('checkbox', $field['type']);
    }

    public function testLayout()
    {
        $field = Checkbox::make('Checkbox with layout')->layout('horizontal')->toArray();
        $this->assertSame('horizontal', $field['layout']);
    }

    public function testLayoutException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument layout [invalid_layout].');

        Checkbox::make('Checkbox')->layout('invalid_layout');
    }
}
