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

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\RadioButton;

class RadioButtonTest extends TestCase
{
    public function testType()
    {
        $field = RadioButton::make('Radio Button')->toArray();
        $this->assertSame('radio', $field['type']);
    }
}
