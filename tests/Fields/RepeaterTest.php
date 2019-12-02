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
use WordPlate\Acf\Fields\Text;

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

    public function testCollapsed()
    {
        $field = Repeater::make('Repeater Collapsed')
            ->fields([
                Text::make('Title'),
            ])
            ->collapsed('title')
            ->toArray();

        $this->assertSame('field_15a7e5e1', $field['collapsed']);
    }
}
