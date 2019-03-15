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

use WordPlate\Acf\Attributes\Layout;
use WordPlate\Acf\Field;
use WordPlate\Acf\Group;

if (!function_exists('acf_accordion')) {
    /**
     * Get an acf accordion field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_accordion(array $config): Field
    {
        $config = array_merge($config, ['type' => 'accordion']);

        return new Field($config);
    }
}

if (!function_exists('acf_button_group')) {
    /**
     * Get an acf button group field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_button_group(array $config): Field
    {
        $config = array_merge($config, ['type' => 'button_group']);

        return new Field($config, ['choices', 'name']);
    }
}

if (!function_exists('acf_checkbox')) {
    /**
     * Get an acf checkbox field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_checkbox(array $config): Field
    {
        $config = array_merge($config, ['type' => 'checkbox']);

        return new Field($config, ['choices', 'name']);
    }
}

if (!function_exists('acf_clone')) {
    /**
     * Get an acf clone content field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_clone(array $config): Field
    {
        $config = array_merge($config, ['type' => 'clone']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_color_picker')) {
    /**
     * Get an acf color picker field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_color_picker(array $config): Field
    {
        $config = array_merge($config, ['type' => 'color_picker']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_conditional')) {
    /**
     * Get an acf conditional logic array.
     *
     * @param string $name
     * @param string $operator
     * @param string|null $value
     *
     * @return array
     */
    function acf_conditional(string $name, string $operator, string $value = null): array
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
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_date_picker(array $config): Field
    {
        $config = array_merge($config, ['type' => 'date_picker']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_date_time_picker')) {
    /**
     * Get an acf date time picker field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_date_time_picker(array $config): Field
    {
        $config = array_merge($config, ['type' => 'date_time_picker']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_email')) {
    /**
     * Get an acf email field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_email(array $config): Field
    {
        $config = array_merge($config, ['type' => 'email']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_field_group')) {
    /**
     * Register an acf field group.
     *
     * @param array $config
     *
     * @return void
     */
    function acf_field_group(array $config): void
    {
        if (!function_exists('acf_add_local_field_group')) {
            return;
        }

        $group = new Group($config);

        acf_add_local_field_group($group->toArray());
    }
}

if (!function_exists('acf_file')) {
    /**
     * Get an acf file field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_file(array $config): Field
    {
        $config = array_merge($config, ['type' => 'file']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_flexible_content')) {
    /**
     * Get an acf flexible content field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_flexible_content(array $config): Field
    {
        $config = array_merge($config, ['type' => 'flexible_content']);

        return new Field($config, ['layouts', 'name']);
    }
}

if (!function_exists('acf_gallery')) {
    /**
     * Get an acf gallery field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_gallery(array $config): Field
    {
        $config = array_merge($config, ['type' => 'gallery']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_google_map')) {
    /**
     * Get an acf google map field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_google_map(array $config): Field
    {
        $config = array_merge($config, ['type' => 'google_map']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_group')) {
    /**
     * Get an acf group field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_group(array $config): Field
    {
        $config = array_merge($config, ['type' => 'group']);

        return new Field($config, ['sub_fields', 'name']);
    }
}

if (!function_exists('acf_number')) {
    /**
     * Get an acf number field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_number(array $config): Field
    {
        $config = array_merge($config, ['type' => 'number']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_image')) {
    /**
     * Get an acf image field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_image(array $config): Field
    {
        $config = array_merge($config, ['type' => 'image']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_layout')) {
    /**
     * Get an acf layout settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Layout
     */
    function acf_layout(array $config): Layout
    {
        return new Layout($config, ['name']);
    }
}

if (!function_exists('acf_link')) {
    /**
     * Get an acf link field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_link(array $config): Field
    {
        $config = array_merge($config, ['type' => 'link']);

        return new Field($config, ['name']);
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
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_message(array $config): Field
    {
        $config = array_merge($config, ['type' => 'message']);

        return new Field($config, ['message']);
    }
}

if (!function_exists('acf_page_link')) {
    /**
     * Get an acf page_link field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_page_link(array $config): Field
    {
        $config = array_merge($config, ['type' => 'page_link']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_password')) {
    /**
     * Get an acf password field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_password(array $config): Field
    {
        $config = array_merge($config, ['type' => 'password']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_post_object')) {
    /**
     * Get an acf post_object field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_post_object(array $config): Field
    {
        $config = array_merge($config, ['type' => 'post_object']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_radio')) {
    /**
     * Get an acf radio field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_radio(array $config): Field
    {
        $config = array_merge($config, ['type' => 'radio']);

        return new Field($config, ['choices', 'name']);
    }
}

if (!function_exists('acf_range')) {
    /**
     * Get an acf range field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_range(array $config): Field
    {
        $config = array_merge($config, ['type' => 'range']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_relationship')) {
    /**
     * Get an acf relationship field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_relationship(array $config): Field
    {
        $config = array_merge($config, ['type' => 'relationship']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_repeater')) {
    /**
     * Get an acf repeater field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_repeater(array $config): Field
    {
        $config = array_merge($config, ['type' => 'repeater']);

        return new Field($config, ['sub_fields', 'name']);
    }
}

if (!function_exists('acf_select')) {
    /**
     * Get an acf select field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_select(array $config): Field
    {
        $config = array_merge($config, ['type' => 'select']);

        return new Field($config, ['choices', 'name']);
    }
}

if (!function_exists('acf_tab')) {
    /**
     * Get an acf tab field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_tab(array $config): Field
    {
        $config = array_merge($config, ['type' => 'tab']);

        return new Field($config);
    }
}

if (!function_exists('acf_taxonomy')) {
    /**
     * Get an acf taxonomy field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_taxonomy(array $config): Field
    {
        $config = array_merge($config, ['type' => 'taxonomy']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_text')) {
    /**
     * Get an acf text field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_text(array $config): Field
    {
        $config = array_merge($config, ['type' => 'text']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_textarea')) {
    /**
     * Get an acf textarea field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_textarea(array $config): Field
    {
        $config = array_merge($config, ['type' => 'textarea']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_time_picker')) {
    /**
     * Get an acf time picker field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_time_picker(array $config): Field
    {
        $config = array_merge($config, ['type' => 'time_picker']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_true_false')) {
    /**
     * Get an acf true_false field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_true_false(array $config): Field
    {
        $config = array_merge($config, ['type' => 'true_false']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_url')) {
    /**
     * Get an acf url field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_url(array $config): Field
    {
        $config = array_merge($config, ['type' => 'url']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_user')) {
    /**
     * Get an acf user field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_user(array $config): Field
    {
        $config = array_merge($config, ['type' => 'user']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_wysiwyg')) {
    /**
     * Get an acf wysiwyg field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_wysiwyg(array $config): Field
    {
        $config = array_merge($config, ['type' => 'wysiwyg']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('acf_oembed')) {
    /**
     * Get an acf oembed field settings array.
     *
     * @param array $config
     *
     * @return \WordPlate\Acf\Field
     */
    function acf_oembed(array $config): Field
    {
        $config = array_merge($config, ['type' => 'oembed']);

        return new Field($config, ['name']);
    }
}

if (!function_exists('field')) {
    /**
     * Shorthand getter for the fields and sub fields functions.
     *
     * @param string $name
     * @param int|\WP_Post|null $post
     *
     * @return mixed
     */
    function field(string $name, $post = null)
    {
        if (!function_exists('get_field')) {
            return;
        }

        if ($post) {
            $value = get_field($name, $post);
        } else {
            $value = get_sub_field($name) ?? get_field($name);
        }

        return empty($value) ? null : $value;
    }
}

if (!function_exists('is_layout')) {
    /**
     * Check whether current row is layout.
     *
     * @param string $layout
     *
     * @return bool
     */
    function is_layout(string $layout): bool
    {
        return get_row_layout() === $layout;
    }
}

if (!function_exists('option')) {
    /**
     * Shorthand getter for the field option function.
     *
     * @param string $name
     *
     * @return mixed
     */
    function option(string $name)
    {
        if (!function_exists('get_field')) {
            return;
        }

        $value = get_field($name, 'option');

        return empty($value) ? null : $value;
    }
}
