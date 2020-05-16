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

namespace WordPlate\Tests\Acf;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\FieldGroup;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Location;

class FieldGroupTest extends TestCase
{
    public function testFields()
    {
        $fieldGroup = new FieldGroup([
            'title' => 'Event',
            'fields' => [
                Text::make('Event Title'),
            ],
            'location' => [],
        ]);

        $fields = $fieldGroup->toArray()['fields'];
        $this->assertArrayHasKey('key', $fields[0]);
    }

    public function testKey()
    {
        $fieldGroup = new FieldGroup(['title' => 'Apartment', 'fields' => [], 'location' => []]);
        $this->assertSame('group_b1c2ce91', $fieldGroup->toArray()['key']);
    }

    public function testCustomKey()
    {
        $fieldGroup = new FieldGroup(['key' => 'house', 'title' => 'Apartment', 'fields' => [], 'location' => []]);
        $this->assertSame('group_0cfb455b', $fieldGroup->toArray()['key']);
    }

    public function testLocation()
    {
        $fieldGroup = new FieldGroup([
            'title' => 'Plant',
            'fields' => [],
            'location' => [
                Location::if('post_type', 'page'),
            ],
        ]);

        $location = $fieldGroup->toArray()['location'];
        $this->assertArrayHasKey('param', $location[0][0]);
    }

    public function testStyle()
    {
        $fieldGroup = new FieldGroup(['title' => 'Employee', 'fields' => [], 'location' => []]);
        $this->assertSame('seamless', $fieldGroup->toArray()['style']);

        $fieldGroup = new FieldGroup(['title' => 'Student', 'fields' => [], 'location' => [], 'style' => 'default']);
        $this->assertSame('default', $fieldGroup->toArray()['style']);
    }

    public function testRequiredKeys()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Missing field group configuration key [title].');
        new FieldGroup(['fields' => [], 'location' => []]);
    }
}
