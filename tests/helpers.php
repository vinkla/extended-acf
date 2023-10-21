<?php

/**
 * Copyright (c) Vincent Klaiber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

function add_filter()
{
    //
}

function register_field_group()
{
    //
}

function sanitize_title($value)
{
    return str_replace(' ', '-', strtolower($value));
}
