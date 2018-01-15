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
 * This is the helpers test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class HelpersTest extends TestCase
{
    protected function assertFieldType($type, Field $field)
    {
        $this->assertSame($type, $field->getType());
    }

    public function testFields()
    {
        $settings = ['name' => 'test', 'label' => 'test'];

        $this->assertFieldType('accordion', acf_accordion($settings));
        $this->assertFieldType('button_group', acf_button_group(array_merge(['choices' => []], $settings)));
        $this->assertFieldType('checkbox', acf_checkbox(array_merge(['choices' => []], $settings)));
        $this->assertFieldType('clone', acf_clone($settings));
        $this->assertFieldType('color_picker', acf_color_picker($settings));
        $this->assertFieldType('date_picker', acf_date_picker($settings));
        $this->assertFieldType('date_time_picker', acf_date_time_picker($settings));
        $this->assertFieldType('email', acf_email($settings));
        $this->assertFieldType('file', acf_file($settings));
        $this->assertFieldType('flexible_content', acf_flexible_content(array_merge(['layouts' => []], $settings)));
        $this->assertFieldType('gallery', acf_gallery($settings));
        $this->assertFieldType('google_map', acf_google_map($settings));
        $this->assertFieldType('group', acf_group(array_merge(['sub_fields' => []], $settings)));
        $this->assertFieldType('image', acf_image($settings));
        $this->assertFieldType('link', acf_link($settings));
        $this->assertFieldType('message', acf_message(array_merge(['message' => ''], $settings)));
        $this->assertFieldType('number', acf_number($settings));
        $this->assertFieldType('oembed', acf_oembed($settings));
        $this->assertFieldType('page_link', acf_page_link($settings));
        $this->assertFieldType('password', acf_password($settings));
        $this->assertFieldType('post_object', acf_post_object($settings));
        $this->assertFieldType('radio', acf_radio(array_merge(['choices' => []], $settings)));
        $this->assertFieldType('range', acf_range($settings));
        $this->assertFieldType('relationship', acf_relationship($settings));
        $this->assertFieldType('repeater', acf_repeater(array_merge(['sub_fields' => []], $settings)));
        $this->assertFieldType('select', acf_select(array_merge(['choices' => []], $settings)));
        $this->assertFieldType('tab', acf_tab($settings));
        $this->assertFieldType('taxonomy', acf_taxonomy($settings));
        $this->assertFieldType('text', acf_text($settings));
        $this->assertFieldType('textarea', acf_textarea($settings));
        $this->assertFieldType('time_picker', acf_time_picker($settings));
        $this->assertFieldType('true_false', acf_true_false($settings));
        $this->assertFieldType('url', acf_url($settings));
        $this->assertFieldType('user', acf_user($settings));
        $this->assertFieldType('wysiwyg', acf_wysiwyg($settings));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMissingSubFieldsKey()
    {
        acf_repeater(['name' => 'test', 'label' => 'test']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMissingNameKey()
    {
        acf_text(['label']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMissingLabelKey()
    {
        acf_text(['name']);
    }

    public function testConditionalLogic()
    {
        $logic = [
            'name' => 'type',
            'operator' => '==',
            'value' => 'image',
        ];

        $this->assertSame($logic, acf_conditional('type', 'image'));
        $this->assertSame($logic, acf_conditional('type', '==', 'image'));

        $logic = [
            'name' => 'type',
            'operator' => '!=',
            'value' => 'gallery',
        ];

        $this->assertSame($logic, acf_conditional('type', '!=', 'gallery'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testFieldGroup()
    {
        require __DIR__.'/stubs/functions.php';

        $settings = require __DIR__.'/stubs/settings.php';

        $this->assertNull(acf_field_group($settings));
    }

    /**
     * @runInSeparateProcess
     */
    public function testFieldGroupMissingFunction()
    {
        $this->assertNull(acf_field_group([]));
    }

    public function testLocation()
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

    /**
     * @runInSeparateProcess
     */
    public function testPage()
    {
        require __DIR__.'/stubs/functions.php';

        $this->assertNull(acf_page([
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-general-settings',
        ]));
    }

    /**
     * @runInSeparateProcess
     */
    public function testPageMissingFunction()
    {
        $this->assertNull(acf_page([]));
    }

    /**
     * @runInSeparateProcess
     */
    public function testField()
    {
        require __DIR__.'/stubs/functions.php';

        $this->assertSame('marty', field('marty', 11));
        $this->assertNull(field('marty'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testOption()
    {
        require __DIR__.'/stubs/functions.php';

        $this->assertSame('marty', option('marty'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testMissingGetFieldFunction()
    {
        $this->assertNull(field('field'));
        $this->assertNull(option('option'));
    }
}
