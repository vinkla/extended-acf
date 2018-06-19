<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Group;

/**
 * This is the group test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class GroupTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testGetKey()
    {
        $group = $this->getGroup();

        $this->assertSame('employee', $group->getKey());
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetFields()
    {
        $group = $this->getGroup();

        $fields = $group->getFields();

        $this->assertInternalType('array', $fields);
        $this->assertSame('text', $fields[0]['type']);
    }

    public function testGroupMissingTitleKey()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Missing setting key [title].');

        new Group(['key' => 'without_title']);
    }

    public function testCustomKey()
    {
        $group = new Group([
            'key' => 'image',
            'title' => 'Image',
            'fields' => []
        ]);

        $this->assertSame([
            'key' => 'image',
            'title' => 'Image',
            'fields' => [],
        ], $group->toArray());
    }

    /**
     * @runInSeparateProcess
     */
    public function testToArray()
    {
        $group = $this->getGroup();

        $this->assertSame([
            'title' => 'Employee',
            'fields' => [
                [
                    'label' => 'First Name',
                    'name' => 'first_name',
                    'type' => 'text',
                    'key' => 'field_63445d8e',
                ],
            ],
            'key' => 'group_13b71421',
        ], $group->toArray());
    }

    protected function getGroup()
    {
        $group = new Group([
            'title' => 'Employee',
            'fields' => [
                acf_text(['label' => 'First Name', 'name' => 'first_name']),
            ],
        ]);

        return $group;
    }
}
