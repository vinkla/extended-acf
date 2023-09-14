<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF;

class Location
{
    protected array $rules = [];

    /**
     * @param string $param post_type, post_template, post_status, post_format, post_category, post_taxonomy, post, page_template, page_type, page_parent, page, current_user, current_user_role, user_form, user_role, taxonomy, attachment, comment, widget, nav_menu, nav_menu, nav_menu_item, block, options_page
     * @param string $operator `==` is equal to, `!=` is not equal to
     */
    public function __construct(string $param, string $operator, string|null $value = null)
    {
        $this->rules[] = ['param' => $param, 'operator' => $operator, 'value' => $value];
    }

    /**
     * @param string $param post_type, post_template, post_status, post_format, post_category, post_taxonomy, post, page_template, page_type, page_parent, page, current_user, current_user_role, user_form, user_role, taxonomy, attachment, comment, widget, nav_menu, nav_menu, nav_menu_item, block, options_page
     * @param string $operator `==` is equal to, `!=` is not equal to
     */
    public static function where(string $param, string $operator, string|null $value = null): static
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '==';
        }

        return new self($param, $operator, $value);
    }

    /**
     * @param string $param post_type, post_template, post_status, post_format, post_category, post_taxonomy, post, page_template, page_type, page_parent, page, current_user, current_user_role, user_form, user_role, taxonomy, attachment, comment, widget, nav_menu, nav_menu, nav_menu_item, block, options_page
     * @param string $operator `==` is equal to, `!=` is not equal to
     */
    public function and(string $param, string $operator, string|null $value = null): static
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '==';
        }

        $this->rules[] = ['param' => $param, 'operator' => $operator, 'value' => $value];

        return $this;
    }

    /** @internal */
    public function get(): array
    {
        return $this->rules;
    }
}
