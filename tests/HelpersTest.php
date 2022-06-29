<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests;

use Extended\ACF\Fields\Text;
use Extended\ACF\Location;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    public function testFields()
    {
        $settings = register_extended_field_group([
            'title' => 'Event',
            'fields' => [
                Text::make('Event Title'),
            ],
            'location' => [],
        ]);

        $this->assertArrayHasKey('key', $settings['fields'][0]);
    }

    public function testKey()
    {
        $settings = register_extended_field_group(['title' => 'Apartment', 'fields' => [], 'location' => []]);
        $this->assertSame('group_b1c2ce91', $settings['key']);
    }

    public function testCustomKey()
    {
        $settings = register_extended_field_group(['key' => 'house', 'title' => 'Apartment', 'fields' => [], 'location' => []]);
        $this->assertSame('group_0cfb455b', $settings['key']);
    }

    public function testLocation()
    {
        $settings = register_extended_field_group([
            'title' => 'Plant',
            'fields' => [],
            'location' => [
                Location::where('post_type', 'page'),
            ],
        ]);

        $location = $settings['location'];
        $this->assertArrayHasKey('param', $location[0][0]);
    }

    public function testStyle()
    {
        $settings = register_extended_field_group(['title' => 'Employee', 'fields' => [], 'location' => []]);
        $this->assertSame('seamless', $settings['style']);

        $settings = register_extended_field_group(['title' => 'Student', 'fields' => [], 'location' => [], 'style' => 'default']);
        $this->assertSame('default', $settings['style']);
    }

    public function testRequiredKeys()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Missing field group setting [title].');
        register_extended_field_group(['fields' => [], 'location' => []]);
    }
}
