<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

namespace WordPlate\Acf;

class Location
{
    protected $rules = [];

    /** @param string $param post_type, post_template, post_status, post_format, post_category, post_taxonomy, post, page_template, page_type, page_parent, page, current_user, current_user_role, user_form, user_role, taxonomy, attachment, comment, widget, nav_menu, nav_menu, nav_menu_item, block or options_page */
    public function __construct(string $param, string $operator, ?string $value = null)
    {
        $this->rules[] = compact('param', 'operator', 'value');
    }

    /**
     * @param string $param post_type, post_template, post_status, post_format, post_category, post_taxonomy, post, page_template, page_type, page_parent, page, current_user, current_user_role, user_form, user_role, taxonomy, attachment, comment, widget, nav_menu, nav_menu, nav_menu_item, block or options_page
     * @return static
     */
    public static function if(string $param, string $operator, ?string $value = null): self
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '==';
        }

        return new self($param, $operator, $value);
    }

    /**
     * @param string $param post_type, post_template, post_status, post_format, post_category, post_taxonomy, post, page_template, page_type, page_parent, page, current_user, current_user_role, user_form, user_role, taxonomy, attachment, comment, widget, nav_menu, nav_menu, nav_menu_item, block or options_page
     * @return static
     */
    public function and(string $param, string $operator, ?string $value = null): self
    {
        if (func_num_args() === 2) {
            $value = $operator;
            $operator = '==';
        }

        $this->rules[] = compact('param', 'operator', 'value');

        return $this;
    }

    public function toArray(): array
    {
        return $this->rules;
    }
}
