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
use WordPlate\Acf\Layout;

if (!function_exists('acf_accordion')) {
    /**
     * Get an acf accordion field settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_accordion(array $settings): Field
    {
        $settings = array_merge($settings, ['type' => 'accordion']);

        return new Field($settings);
    }
}

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
        $settings = array_merge($settings, ['type' => 'button_group']);

        return new Field($settings, ['choices', 'name']);
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
        $settings = array_merge($settings, ['type' => 'checkbox']);

        return new Field($settings, ['choices', 'name']);
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
        $settings = array_merge($settings, ['type' => 'clone']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'color_picker']);

        return new Field($settings, ['name']);
    }
}

if (!function_exists('acf_conditional_logic')) {
    /**
     * Get an acf conditional logic array.
     *
     * @param string $name
     * @param string $operator
     * @param string|null $value
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
        $settings = array_merge($settings, ['type' => 'date_picker']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'date_time_picker']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'email']);

        return new Field($settings, ['name']);
    }
}

if (!function_exists('acf_field_group')) {
    /**
     * Register an acf field group.
     *
     * @param array $settings
     *
     * @return void|null
     */
    function acf_field_group(array $settings)
    {
        if (!function_exists('acf_add_local_field_group')) {
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
        $settings = array_merge($settings, ['type' => 'file']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'flexible_content']);

        return new Field($settings, ['layouts', 'name']);
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
        $settings = array_merge($settings, ['type' => 'gallery']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'google_map']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'group']);

        return new Field($settings, ['sub_fields', 'name']);
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
        $settings = array_merge($settings, ['type' => 'number']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'image']);

        return new Field($settings, ['name']);
    }
}

if (!function_exists('acf_layout')) {
    /**
     * Get an acf layout settings array.
     *
     * @param array $settings
     *
     * @return \WordPlate\Acf\Layout
     */
    function acf_layout(array $settings): Layout
    {
        return new Layout($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'link']);

        return new Field($settings, ['name']);
    }
}

if (!function_exists('acf_location')) {
    /**
     * Get an acf location array.
     *
     * @param string $param
     * @param string $operator
     * @param string|null $value
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
        $settings = array_merge($settings, ['type' => 'message']);

        return new Field($settings, ['message']);
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
        $settings = array_merge($settings, ['type' => 'page_link']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'password']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'post_object']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'radio']);

        return new Field($settings, ['choices', 'name']);
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
        $settings = array_merge($settings, ['type' => 'range']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'relationship']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'repeater']);

        return new Field($settings, ['sub_fields', 'name']);
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
        $settings = array_merge($settings, ['type' => 'select']);

        return new Field($settings, ['choices', 'name']);
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
        $settings = array_merge($settings, ['type' => 'tab']);

        return new Field($settings);
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
        $settings = array_merge($settings, ['type' => 'taxonomy']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'text']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'textarea']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'time_picker']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'true_false']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'url']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'user']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'wysiwyg']);

        return new Field($settings, ['name']);
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
        $settings = array_merge($settings, ['type' => 'oembed']);

        return new Field($settings, ['name']);
    }
}
