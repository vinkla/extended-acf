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

namespace WordPlate\Tests;

use PHPUnit\Framework\TestCase;

/**
 * This is the helpers test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class HelpersTest extends TestCase
{
    protected function assertFieldType($type, $settings)
    {
        $this->assertSame($type, $settings['type']);
    }

    public function testAcfField()
    {
        $settings = ['name' => 'test', 'label' => 'test'];

        $this->assertFieldType('checkbox', acf_checkbox($settings));
        $this->assertFieldType('email', acf_email($settings));
        $this->assertFieldType('file', acf_file($settings));
        $this->assertFieldType('gallery', acf_gallery($settings));
        $this->assertFieldType('image', acf_image($settings));
        $this->assertFieldType('number', acf_number($settings));
        $this->assertFieldType('oembed', acf_oembed($settings));
        $this->assertFieldType('page_link', acf_page_link($settings));
        $this->assertFieldType('password', acf_password($settings));
        $this->assertFieldType('post_object', acf_post_object($settings));
        $this->assertFieldType('radio', acf_radio($settings));
        $this->assertFieldType('relationship', acf_relationship($settings));
        $this->assertFieldType('select', acf_select($settings));
        $this->assertFieldType('taxonomy', acf_taxonomy($settings));
        $this->assertFieldType('text', acf_text($settings));
        $this->assertFieldType('textarea', acf_textarea($settings));
        $this->assertFieldType('true_false', acf_true_false($settings));
        $this->assertFieldType('url', acf_url($settings));
        $this->assertFieldType('user', acf_user($settings));
        $this->assertFieldType('wysiwyg', acf_wysiwyg($settings));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAcfFieldMissingSettingName()
    {
        acf_text(['label']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAcfFieldMissingSettingLabel()
    {
        acf_text(['name']);
    }

    public function testAcfLocation()
    {
        $location = [
            'param' => 'post_type',
            'operator' => '==',
            'value' => 'post',
        ];

        $this->assertSame($location, acf_location('post_type', 'post'));
        $this->assertSame($location, acf_location('post_type', '==', 'post'));

        $location = [
            'param' => 'page_template',
            'operator' => '!=',
            'value' => 'templates/start-page.php',
        ];

        $this->assertSame($location, acf_location('page_template', '!=', 'templates/start-page.php'));
    }

    public function testAcfHideOnScreen()
    {
        $elements = [
            0 => 'author',
            1 => 'categories',
            2 => 'comments',
            3 => 'custom_fields',
            4 => 'discussion',
            5 => 'excerpt',
            6 => 'format',
            7 => 'page_attributes',
            8 => 'revisions',
            9 => 'send-trackbacks',
            10 => 'slug',
            11 => 'tags',
        ];

        $this->assertSame($elements, acf_hide_on_screen(['author', 'categories', 'comments', 'custom_fields', 'discussion', 'excerpt', 'format', 'page_attributes', 'revisions', 'send-trackbacks', 'slug', 'tags']));
    }

    public function testAcfFieldGroup()
    {
        $fields = [
            acf_image(['name' => 'image', 'label' => 'Image']),
            acf_text(['name' => 'title', 'label' => 'Title']),
        ];

        $location = [
            acf_location('post_type', 'post'),
            acf_location('post_type', '!=', 'page'),
        ];

        $group = acf_add_local_field_group([
            'title' => 'About',
            'key' => 'group_about',
            'fields' => $fields,
            'location' => $location,
        ]);

        $this->assertNull($group);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAcfFieldGroupPrefix()
    {
        acf_field_group(['key' => 'without_group_']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAcfFieldGroupMissingTitle()
    {
        acf_field_group(['key' => 'group_without_title']);
    }
}
