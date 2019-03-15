<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Field;

/**
 * This is the helpers test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class HelpersTest extends TestCase
{
    protected function assertFieldType($type, Field $field)
    {
        $this->assertSame($type, $field->getType());
    }

    public function testFields()
    {
        $config = ['name' => 'test', 'label' => 'test'];

        $this->assertFieldType('accordion', acf_accordion($config));
        $this->assertFieldType('button_group', acf_button_group(array_merge(['choices' => []], $config)));
        $this->assertFieldType('checkbox', acf_checkbox(array_merge(['choices' => []], $config)));
        $this->assertFieldType('clone', acf_clone($config));
        $this->assertFieldType('color_picker', acf_color_picker($config));
        $this->assertFieldType('date_picker', acf_date_picker($config));
        $this->assertFieldType('date_time_picker', acf_date_time_picker($config));
        $this->assertFieldType('email', acf_email($config));
        $this->assertFieldType('file', acf_file($config));
        $this->assertFieldType('flexible_content', acf_flexible_content(array_merge(['layouts' => []], $config)));
        $this->assertFieldType('gallery', acf_gallery($config));
        $this->assertFieldType('google_map', acf_google_map($config));
        $this->assertFieldType('group', acf_group(array_merge(['sub_fields' => []], $config)));
        $this->assertFieldType('image', acf_image($config));
        $this->assertFieldType('link', acf_link($config));
        $this->assertFieldType('message', acf_message(array_merge(['message' => ''], $config)));
        $this->assertFieldType('number', acf_number($config));
        $this->assertFieldType('oembed', acf_oembed($config));
        $this->assertFieldType('page_link', acf_page_link($config));
        $this->assertFieldType('password', acf_password($config));
        $this->assertFieldType('post_object', acf_post_object($config));
        $this->assertFieldType('radio', acf_radio(array_merge(['choices' => []], $config)));
        $this->assertFieldType('range', acf_range($config));
        $this->assertFieldType('relationship', acf_relationship($config));
        $this->assertFieldType('repeater', acf_repeater(array_merge(['sub_fields' => []], $config)));
        $this->assertFieldType('select', acf_select(array_merge(['choices' => []], $config)));
        $this->assertFieldType('tab', acf_tab($config));
        $this->assertFieldType('taxonomy', acf_taxonomy($config));
        $this->assertFieldType('text', acf_text($config));
        $this->assertFieldType('textarea', acf_textarea($config));
        $this->assertFieldType('time_picker', acf_time_picker($config));
        $this->assertFieldType('true_false', acf_true_false($config));
        $this->assertFieldType('url', acf_url($config));
        $this->assertFieldType('user', acf_user($config));
        $this->assertFieldType('wysiwyg', acf_wysiwyg($config));
    }

    public function testMissingSubFieldsKey()
    {
        $this->expectException(InvalidArgumentException::class);

        acf_repeater(['name' => 'test', 'label' => 'test']);
    }

    public function testMissingNameKey()
    {
        $this->expectException(InvalidArgumentException::class);

        acf_text(['label']);
    }

    public function testMissingLabelKey()
    {
        $this->expectException(InvalidArgumentException::class);

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

        $config = require __DIR__.'/stubs/config.php';

        $this->assertNull(acf_field_group($config));
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

    public function testIsLayout()
    {
        $this->assertTrue(is_layout('text'));
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
