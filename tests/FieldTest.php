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

        $this->assertSame('employee_image', $field->getKey());
    }

    /**
     * @runInSeparateProcess
     */
    public function testSetParentKey()
    {
        $field = $this->getField();

        $field->setParentKey('article');

        $this->assertSame('article_image', $field->getKey());
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetSubFields()
    {
        $field = $this->getField();

        $subFields = $field->getSubFields();

        $this->assertCount(2, $subFields);
        $this->assertSame('text', $subFields[0]['type']);
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetLayouts()
    {
        $field = $this->getField();

        $layouts = $field->getLayouts();

        $this->assertCount(1, $layouts);
        $this->assertSame('text', $layouts[0]['sub_fields'][0]['type']);
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
                    'key' => 'field_9f70f095',
                ],
                [
                    'label' => 'URL',
                    'name' => 'url',
                    'type' => 'url',
                    'key' => 'field_c9bc0661',
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
                            'key' => 'field_2d27e841',
                        ],
                    ],
                    'key' => 'layout_4095e94d',
                ],
            ],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_75e716e7',
                        'operator' => '==',
                        'value' => 'Max Martin',
                    ],
                ],
                [
                    [
                        'field' => 'field_b10b2be3',
                        'operator' => '!=',
                        'value' => 'https://example.com/',
                    ],
                ],
            ],
            'type' => 'image',
            'key' => 'field_c4c7f60f',
        ], $field->toArray());
    }

    protected function getField()
    {
        $field = acf_image([
            'label' => 'Thumbnail',
            'name' => 'image',
            'sub_fields' => [
                acf_text(['label' => 'Source', 'name' => 'source']),
                acf_url(['label' => 'URL', 'name' => 'url']),
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
                    acf_conditional('source', 'Max Martin'),
                ],
                [
                    acf_conditional('url', '!=', 'https://example.com/'),
                ],
            ],
        ]);

        $field->setParentKey('employee');

        return $field;
    }
}
