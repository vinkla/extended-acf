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

use Extended\ACF\Fields\Layout;
use Extended\ACF\Tests\Fields\Settings\Fields;
use InvalidArgumentException;

class LayoutTest extends FieldTestCase
{
    use Fields;

    public string $field = Layout::class;
    public string $type = 'layout';

    public function testType()
    {
        $field = Layout::make('Layout Type')->get();
        $this->assertArrayNotHasKey('type', $field);
    }

    public function testKeyPrefix()
    {
        $field = Layout::make('Key Prefix')->get();
        $this->assertStringStartsWith('layout_', $field['key']);
    }

    public function testLayout()
    {
        $field = Layout::make('Layout')->layout('table')->get();
        $this->assertSame('table', $field['display']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument layout [test].');

        Layout::make('Invalid Layout')->layout('test')->get();
    }

    public function testMaxInstances()
    {
        $field = Layout::make('Max Instances')->maxInstances(10)->get();
        $this->assertSame(10, $field['max']);
    }

    public function testMinInstances()
    {
        $field = Layout::make('Min Instances')->minInstances(5)->get();
        $this->assertSame(5, $field['min']);
    }
}
