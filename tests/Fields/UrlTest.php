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

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Url;

class UrlTest extends TestCase
{
    public function testType()
    {
        $field = Url::make('Url')->toArray();
        $this->assertSame('url', $field['type']);
    }

    public function testDefaultValue()
    {
        $field = Url::make('Default Value')->defaultValue('dodgerblue')->toArray();
        $this->assertSame('dodgerblue', $field['default_value']);
    }
}
