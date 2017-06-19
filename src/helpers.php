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

use WordPlate\Acf\Acf;

if (!function_exists('acf_checkbox')) {
    /**
     * Get an acf checkbox field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_checkbox(array $settings): array
    {
        return Acf::field('checkbox', $settings, ['choices']);
    }
}

if (!function_exists('acf_clone')) {
    /**
     * Get an acf clone content field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_clone(array $settings): array
    {
        return Acf::field('clone', $settings);
    }
}

if (!function_exists('acf_color_picker')) {
    /**
     * Get an acf color picker field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_color_picker(array $settings): array
    {
        return Acf::field('color_picker', $settings);
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
     * @return array
     */
    function acf_date_picker(array $settings): array
    {
        return Acf::field('date_picker', $settings);
    }
}

if (!function_exists('acf_date_time_picker')) {
    /**
     * Get an acf date time picker field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_date_time_picker(array $settings): array
    {
        return Acf::field('date_time_picker', $settings);
    }
}

if (!function_exists('acf_email')) {
    /**
     * Get an acf email field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_email(array $settings): array
    {
        return Acf::field('email', $settings);
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
        return Acf::group($settings);
    }
}

if (!function_exists('acf_file')) {
    /**
     * Get an acf file field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_file(array $settings): array
    {
        return Acf::field('file', $settings);
    }
}

if (!function_exists('acf_flexible_content')) {
    /**
     * Get an acf flexible content field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_flexible_content(array $settings): array
    {
        return Acf::field('flexible_content', $settings, ['layouts']);
    }
}

if (!function_exists('acf_gallery')) {
    /**
     * Get an acf gallery field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_gallery(array $settings): array
    {
        return Acf::field('gallery', $settings);
    }
}

if (!function_exists('acf_google_map')) {
    /**
     * Get an acf google map field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_google_map(array $settings): array
    {
        return Acf::field('google_map', $settings);
    }
}

if (!function_exists('acf_group')) {
    /**
     * Get an acf group field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_group(array $settings): array
    {
        return Acf::field('group', $settings, ['sub_fields']);
    }
}

if (!function_exists('acf_number')) {
    /**
     * Get an acf number field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_number(array $settings): array
    {
        return Acf::field('number', $settings);
    }
}

if (!function_exists('acf_image')) {
    /**
     * Get an acf image field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_image(array $settings): array
    {
        return Acf::field('image', $settings);
    }
}

if (!function_exists('acf_link')) {
    /**
     * Get an acf link field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_link(array $settings): array
    {
        return Acf::field('link', $settings);
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
     * @return array
     */
    function acf_message(array $settings): array
    {
        return Acf::field('message', $settings, ['message']);
    }
}

if (!function_exists('acf_page_link')) {
    /**
     * Get an acf page_link field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_page_link(array $settings): array
    {
        return Acf::field('page_link', $settings);
    }
}

if (!function_exists('acf_password')) {
    /**
     * Get an acf password field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_password(array $settings): array
    {
        return Acf::field('password', $settings);
    }
}

if (!function_exists('acf_post_object')) {
    /**
     * Get an acf post_object field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_post_object(array $settings): array
    {
        return Acf::field('post_object', $settings);
    }
}

if (!function_exists('acf_radio')) {
    /**
     * Get an acf radio field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_radio(array $settings): array
    {
        return Acf::field('radio', $settings, ['choices']);
    }
}

if (!function_exists('acf_relationship')) {
    /**
     * Get an acf relationship field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_relationship(array $settings): array
    {
        return Acf::field('relationship', $settings);
    }
}

if (!function_exists('acf_repeater')) {
    /**
     * Get an acf repeater field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_repeater(array $settings): array
    {
        return Acf::field('repeater', $settings, ['sub_fields']);
    }
}

if (!function_exists('acf_select')) {
    /**
     * Get an acf select field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_select(array $settings): array
    {
        return Acf::field('select', $settings, ['choices']);
    }
}

if (!function_exists('acf_tab')) {
    /**
     * Get an acf tab field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_tab(array $settings): array
    {
        return Acf::field('tab', $settings);
    }
}

if (!function_exists('acf_taxonomy')) {
    /**
     * Get an acf taxonomy field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_taxonomy(array $settings): array
    {
        return Acf::field('taxonomy', $settings);
    }
}

if (!function_exists('acf_text')) {
    /**
     * Get an acf text field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_text(array $settings): array
    {
        return Acf::field('text', $settings);
    }
}

if (!function_exists('acf_textarea')) {
    /**
     * Get an acf textarea field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_textarea(array $settings): array
    {
        return Acf::field('textarea', $settings);
    }
}

if (!function_exists('acf_time_picker')) {
    /**
     * Get an acf time picker field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_time_picker(array $settings): array
    {
        return Acf::field('time_picker', $settings);
    }
}

if (!function_exists('acf_true_false')) {
    /**
     * Get an acf true_false field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_true_false(array $settings): array
    {
        return Acf::field('true_false', $settings);
    }
}

if (!function_exists('acf_url')) {
    /**
     * Get an acf url field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_url(array $settings): array
    {
        return Acf::field('url', $settings);
    }
}

if (!function_exists('acf_user')) {
    /**
     * Get an acf user field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_user(array $settings): array
    {
        return Acf::field('user', $settings);
    }
}

if (!function_exists('acf_wysiwyg')) {
    /**
     * Get an acf wysiwyg field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_wysiwyg(array $settings): array
    {
        return Acf::field('wysiwyg', $settings);
    }
}

if (!function_exists('acf_oembed')) {
    /**
     * Get an acf oembed field settings array.
     *
     * @param array $settings
     *
     * @return array
     */
    function acf_oembed(array $settings): array
    {
        return Acf::field('oembed', $settings);
    }
}
