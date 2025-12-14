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

namespace Extended\ACF\Tests\Fields\Settings;

trait DefaultValue
{
    public function testDefault()
    {
        $field = $this->make('Default')->default('Chris Coyier')->toArray();
        $this->assertSame('Chris Coyier', $field['default_value']);
    }
}
