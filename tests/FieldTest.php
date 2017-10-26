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
use WordPlate\Acf\Field;

/**
 * This is the field test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class FieldTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testGetKey()
    {
        $field = $this->getField();

        $this->assertSame('field_employee_image', $field->getKey());
    }

    /**
     * @runInSeparateProcess
     */
    public function testSetParentKey()
    {
        $field = $this->getField();

        $field->setParentKey('article');

        $this->assertSame('field_article_image', $field->getKey());
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetSubFields()
    {
        $field = $this->getField();

        $subFields = $field->getSubFields();

        $this->assertCount(1, $subFields);
        $this->assertSame('field_employee_image_source', $subFields[0]['key']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetLayouts()
    {
        $field = $this->getField();

        $layouts = $field->getLayouts('layouts');

        $this->assertCount(1, $layouts);
        $this->assertSame('field_employee_image_author', $layouts[0]['sub_fields'][0]['key']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetConditionalLogic()
    {
        $field = $this->getField();

        $this->assertInternalType('array', $field->getConditionalLogic());
    }

    /**
     * @runInSeparateProcess
     */
    public function testToArray()
    {
        $field = $this->getField();

        $this->assertSame([
            'label' => 'Thumbnail',
            'name' => 'image',
            'sub_fields' => [
                [
                    'label' => 'Source',
                    'name' => 'source',
                    'type' => 'text',
                    'key' => 'field_employee_image_source',
                ],
            ],
            'layouts' => [
                [
                    'label' => 'Author Block',
                    'name' => 'author-block',
                    'display' => 'block',
                    'sub_fields' => [
                        [
                            'label' => 'Author',
                            'name' => 'author',
                            'type' => 'text',
                            'key' => 'field_employee_image_author',
                        ],
                    ],
                    'key' => 'layout_employee_image_author_block',
                ],
            ],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_employee_image_source',
                        'operator' => '==',
                        'value' => 'https://example.com/',
                    ],
                ],
                [
                    [
                        'field' => 'field_employee_image_author',
                        'operator' => '!=',
                        'value' => 'Max Martin',
                    ],
                ],
            ],
            'type' => 'image',
            'key' => 'field_employee_image',
        ], $field->toArray());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The field key [field_employee_link] is not unique.
     */
    public function testKeyDuplication()
    {
        for ($i = 0; $i < 2; $i++) {
            $field = acf_url(['name' => 'link', 'label' => 'Link']);
            $field->setParentKey('employee');
            $field->getKey();
        }
    }

    protected function getField()
    {
        $field = acf_image([
            'label' => 'Thumbnail',
            'name' => 'image',
            'sub_fields' => [
                acf_text(['label' => 'Source', 'name' => 'source']),
            ],
            'layouts' => [
                acf_layout([
                    'label' => 'Author Block',
                    'name' => 'author-block',
                    'display' => 'block',
                    'sub_fields' => [
                        acf_text(['label' => 'Author', 'name' => 'author']),
                    ],
                ]),
            ],
            'conditional_logic' => [
                [
                    acf_conditional_logic('source', 'https://example.com/'),
                ],
                [
                    acf_conditional_logic('author', '!=', 'Max Martin'),
                ],
            ],
        ]);

        $field->setParentKey('employee');

        return $field;
    }
}
