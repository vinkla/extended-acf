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

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Repeater;

class RepeaterTest extends TestCase
{
    public function testType()
    {
        $field = Repeater::make('Repeater')->toArray();
        $this->assertSame('repeater', $field['type']);
    }

    public function testButtonLabel()
    {
        $field = Repeater::make('Repeater Button label')->buttonLabel('Add Item')->toArray();
        $this->assertSame('Add Item', $field['button_label']);
    }
}
