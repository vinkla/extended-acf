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

function register_field_group()
{
    //
}

function sanitize_title($value)
{
    return str_replace(' ', '-', strtolower($value));
}
