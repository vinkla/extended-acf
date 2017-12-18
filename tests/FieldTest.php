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
                    'key' => 'field_036330209160eb85fa2524270cf5fd97',
                ],
                [
                    'label' => 'URL',
                    'name' => 'url',
                    'type' => 'url',
                    'key' => 'field_58495fbdc1ed79748dc65ae15fdd59c6',
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
                            'key' => 'field_35d1cc5541d26e3ac66999044518367d',
                        ],
                    ],
                    'key' => 'layout_1f59996c21f83a4e3b075601c3cf4e4d',
                ],
            ],
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_d3cc89c64c574699c6de81fc03ae58dc',
                        'operator' => '==',
                        'value' => 'Max Martin',
                    ],
                ],
                [
                    [
                        'field' => 'field_ff3114c4be74e832ccbddd74891cd947',
                        'operator' => '!=',
                        'value' => 'https://example.com/',
                    ],
                ],
            ],
            'type' => 'image',
            'key' => 'field_58ed1ef698a85b34d7c21b5c66444cb9',
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
