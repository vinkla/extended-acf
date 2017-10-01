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

        $this->assertSame('group_employee', $group->getKey());
    }

    /**
     * @runInSeparateProcess
     */
    public function testSetKey()
    {
        $group = $this->getGroup();

        $group->setKey('event');

        $this->assertSame('group_event', $group->getKey());
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetFields()
    {
        $group = $this->getGroup();

        $fields = $group->getFields();

        $this->assertInternalType('array', $fields);
        $this->assertSame('field_employee_first_name', $fields[0]['key']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testToArray()
    {
        $group = $this->getGroup();

        $this->assertSame([
            'key' => 'group_employee',
            'title' => 'Employee',
            'fields' => [
                [
                    'type' => 'text',
                    'label' => 'First Name',
                    'name' => 'first_name',
                    'key' => 'field_employee_first_name',
                ],
            ],
        ], $group->toArray());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing group setting key [title].
     */
    public function testGroupMissingTitleKey()
    {
        new Group(['key' => 'without_title']);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The group key [group_employee] is not unique.
     */
    public function testKeyDuplication()
    {
        $this->getGroup();
        $this->getGroup();
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
