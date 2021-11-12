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
    public function __construct(
        protected array $rules = []
    ) {
        //
    }

    /** @param string $param post_type, post_template, post_status, post_format, post_category, post_taxonomy, post, page_template, page_type, page_parent, page, current_user, current_user_role, user_form, user_role, taxonomy, attachment, comment, widget, nav_menu, nav_menu, nav_menu_item, block or options_page */
    public static function if(string $param): static
    {
        return new self([['param' => $param]]);
    }

    public function equals(string|null $value = null): static
    {
        $key = array_key_last($this->rules);

        $this->rules[$key]['operator'] = '==';
        $this->rules[$key]['value'] = $value;

        return $this;
    }

    public function notEquals(string|null $value = null): static
    {
        $key = array_key_last($this->rules);

        $this->rules[$key]['operator'] = '!=';
        $this->rules[$key]['value'] = $value;

        return $this;
    }

    /** @param string $param post_type, post_template, post_status, post_format, post_category, post_taxonomy, post, page_template, page_type, page_parent, page, current_user, current_user_role, user_form, user_role, taxonomy, attachment, comment, widget, nav_menu, nav_menu, nav_menu_item, block or options_page */
    public function and(string $param): static
    {
        $this->rules[] = ['param' => $param];

        return $this;
    }

    /** @internal */
    public function toArray(): array
    {
        return $this->rules;
    }
}
