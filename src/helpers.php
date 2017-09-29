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

use WordPlate\Acf\Field;
use WordPlate\Acf\Group;

if (!function_exists('acf_button_group')) {
    /**
     * Get an acf button group field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_button_group(array $settings): Field
    {
        return new Field('button_group', $settings, ['choices']);
    }
}

if (!function_exists('acf_checkbox')) {
    /**
     * Get an acf checkbox field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_checkbox(array $settings): Field
    {
        return new Field('checkbox', $settings, ['choices']);
    }
}

if (!function_exists('acf_clone')) {
    /**
     * Get an acf clone content field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_clone(array $settings): Field
    {
        return new Field('clone', $settings);
    }
}

if (!function_exists('acf_color_picker')) {
    /**
     * Get an acf color picker field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_color_picker(array $settings): Field
    {
        return new Field('color_picker', $settings);
    }
}

if (!function_exists('acf_conditional_logic')) {
    /**
     * Get an acf conditional logic array.
     *
     * @param string $name
     * @param string $operator
     * @param null|string $value
     *
     * @return array
     */
    function acf_conditional_logic(string $name, string $operator, string $value = null): array
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '==';
        }

        return compact('name', 'operator', 'value');
    }
}

if (!function_exists('acf_date_picker')) {
    /**
     * Get an acf date picker field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_date_picker(array $settings): Field
    {
        return new Field('date_picker', $settings);
    }
}

if (!function_exists('acf_date_time_picker')) {
    /**
     * Get an acf date time picker field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_date_time_picker(array $settings): Field
    {
        return new Field('date_time_picker', $settings);
    }
}

if (!function_exists('acf_email')) {
    /**
     * Get an acf email field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_email(array $settings): Field
    {
        return new Field('email', $settings);
    }
}

if (!function_exists('acf_field_group')) {
    /**
     * Register an acf field group.
     *
     * @param array $settings
     *
     * @return null|void
     */
    function acf_field_group(array $settings)
    {
        if (function_exists('acf_add_local_field_group')) {
            return;
        }

        $group = new Group($settings);

        $group->setKey($settings['key'] ?? $settings['title']);

        acf_add_local_field_group($group->toArray());
    }
}

if (!function_exists('acf_file')) {
    /**
     * Get an acf file field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_file(array $settings): Field
    {
        return new Field('file', $settings);
    }
}

if (!function_exists('acf_flexible_content')) {
    /**
     * Get an acf flexible content field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_flexible_content(array $settings): Field
    {
        return new Field('flexible_content', $settings, ['layouts']);
    }
}

if (!function_exists('acf_gallery')) {
    /**
     * Get an acf gallery field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_gallery(array $settings): Field
    {
        return new Field('gallery', $settings);
    }
}

if (!function_exists('acf_google_map')) {
    /**
     * Get an acf google map field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_google_map(array $settings): Field
    {
        return new Field('google_map', $settings);
    }
}

if (!function_exists('acf_group')) {
    /**
     * Get an acf group field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_group(array $settings): Field
    {
        return new Field('group', $settings, ['sub_fields']);
    }
}

if (!function_exists('acf_number')) {
    /**
     * Get an acf number field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_number(array $settings): Field
    {
        return new Field('number', $settings);
    }
}

if (!function_exists('acf_image')) {
    /**
     * Get an acf image field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_image(array $settings): Field
    {
        return new Field('image', $settings);
    }
}

if (!function_exists('acf_link')) {
    /**
     * Get an acf link field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_link(array $settings): Field
    {
        return new Field('link', $settings);
    }
}

if (!function_exists('acf_location')) {
    /**
     * Get an acf location array.
     *
     * @param string $param
     * @param string $operator
     * @param null|string $value
     *
     * @return array
     */
    function acf_location(string $param, string $operator, string $value = null): array
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '==';
        }

        return compact('param', 'operator', 'value');
    }
}

if (!function_exists('acf_message')) {
    /**
     * Get an acf message field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_message(array $settings): Field
    {
        return new Field('message', $settings, ['message']);
    }
}

if (!function_exists('acf_page_link')) {
    /**
     * Get an acf page_link field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_page_link(array $settings): Field
    {
        return new Field('page_link', $settings);
    }
}

if (!function_exists('acf_password')) {
    /**
     * Get an acf password field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_password(array $settings): Field
    {
        return new Field('password', $settings);
    }
}

if (!function_exists('acf_post_object')) {
    /**
     * Get an acf post_object field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_post_object(array $settings): Field
    {
        return new Field('post_object', $settings);
    }
}

if (!function_exists('acf_radio')) {
    /**
     * Get an acf radio field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_radio(array $settings): Field
    {
        return new Field('radio', $settings, ['choices']);
    }
}

if (!function_exists('acf_range')) {
    /**
     * Get an acf range field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_range(array $settings): Field
    {
        return new Field('range', $settings);
    }
}

if (!function_exists('acf_relationship')) {
    /**
     * Get an acf relationship field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_relationship(array $settings): Field
    {
        return new Field('relationship', $settings);
    }
}

if (!function_exists('acf_repeater')) {
    /**
     * Get an acf repeater field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_repeater(array $settings): Field
    {
        return new Field('repeater', $settings, ['sub_fields']);
    }
}

if (!function_exists('acf_select')) {
    /**
     * Get an acf select field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_select(array $settings): Field
    {
        return new Field('select', $settings, ['choices']);
    }
}

if (!function_exists('acf_tab')) {
    /**
     * Get an acf tab field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_tab(array $settings): Field
    {
        return new Field('tab', $settings);
    }
}

if (!function_exists('acf_taxonomy')) {
    /**
     * Get an acf taxonomy field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_taxonomy(array $settings): Field
    {
        return new Field('taxonomy', $settings);
    }
}

if (!function_exists('acf_text')) {
    /**
     * Get an acf text field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_text(array $settings): Field
    {
        return new Field('text', $settings);
    }
}

if (!function_exists('acf_textarea')) {
    /**
     * Get an acf textarea field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_textarea(array $settings): Field
    {
        return new Field('textarea', $settings);
    }
}

if (!function_exists('acf_time_picker')) {
    /**
     * Get an acf time picker field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_time_picker(array $settings): Field
    {
        return new Field('time_picker', $settings);
    }
}

if (!function_exists('acf_true_false')) {
    /**
     * Get an acf true_false field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_true_false(array $settings): Field
    {
        return new Field('true_false', $settings);
    }
}

if (!function_exists('acf_url')) {
    /**
     * Get an acf url field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_url(array $settings): Field
    {
        return new Field('url', $settings);
    }
}

if (!function_exists('acf_user')) {
    /**
     * Get an acf user field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_user(array $settings): Field
    {
        return new Field('user', $settings);
    }
}

if (!function_exists('acf_wysiwyg')) {
    /**
     * Get an acf wysiwyg field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_wysiwyg(array $settings): Field
    {
        return new Field('wysiwyg', $settings);
    }
}

if (!function_exists('acf_oembed')) {
    /**
     * Get an acf oembed field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_oembed(array $settings): Field
    {
        return new Field('oembed', $settings);
    }
}
