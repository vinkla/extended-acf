<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\FieldGroup;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Location;

/**
 * This is the field group test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class FieldGroupTest extends TestCase
{
    public function testFields()
    {
        $fieldGroup = new FieldGroup([
            'title' => 'Event',
            'fields' => [
                Text::make('Event Title'),
            ],
            'location' => null,
        ]);

        $fields = $fieldGroup->toArray()['fields'];
        $this->assertArrayHasKey('key', $fields[0]);
    }

    public function testKey()
    {
        $fieldGroup = new FieldGroup(['title' => 'Apartment', 'fields' => null, 'location' => null]);
        $this->assertSame('group_b1c2ce91', $fieldGroup->toArray()['key']);
    }

    public function testLocation()
    {
        $fieldGroup = new FieldGroup([
            'title' => 'Plant',
            'fields' => null,
            'location' => [
                Location::if('post_type', 'page'),
            ],
        ]);

        $location = $fieldGroup->toArray()['location'];
        $this->assertArrayHasKey('param', $location[0][0]);
    }

    public function testStyle()
    {
        $fieldGroup = new FieldGroup(['title' => 'Employee', 'fields' => null, 'location' => null]);
        $this->assertSame('seamless', $fieldGroup->toArray()['style']);

        $fieldGroup = new FieldGroup(['title' => 'Student', 'fields' => null, 'location' => null, 'style' => 'default']);
        $this->assertSame('default', $fieldGroup->toArray()['style']);
    }

    public function testRequiredKeys()
    {
        $config = ['title' => 'Employee', 'fields' => null, 'location' => null];
        $requiredKeys = array_keys($config);

        foreach ($requiredKeys as $key) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectExceptionMessage("Missing field group configuration key [$key].");
            new FieldGroup(array_values(array_diff($config, [$key => null])));
        }
    }
}
