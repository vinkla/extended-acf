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
    public function testSetKey()
    {
        $group = $this->getGroup();

        $group->setKey('event');

        $this->assertSame('event', $group->getKey());
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

    /**
     * @runInSeparateProcess
     */
    public function testToArray()
    {
        $group = $this->getGroup();

        $this->assertSame([
            'key' => 'group_13b71421',
            'title' => 'Employee',
            'fields' => [
                [
                    'label' => 'First Name',
                    'name' => 'first_name',
                    'type' => 'text',
                    'key' => 'field_63445d8e',
                ],
            ],
        ], $group->toArray());
    }

    public function testGroupMissingTitleKey()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Missing setting key [title].');

        new Group(['key' => 'without_title']);
    }

    protected function getGroup()
    {
        $group = new Group([
            'key' => 'employee',
            'title' => 'Employee',
            'fields' => [
                acf_text(['label' => 'First Name', 'name' => 'first_name']),
            ],
        ]);

        $group->setKey('employee');

        return $group;
    }
}
