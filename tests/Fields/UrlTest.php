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

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\Url;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    public function testType()
    {
        $field = Url::make('Url')->get();
        $this->assertSame('url', $field['type']);
    }

    public function testDefaultValue()
    {
        $field = Url::make('Default Value')->defaultValue('dodgerblue')->get();
        $this->assertSame('dodgerblue', $field['default_value']);
    }
}
