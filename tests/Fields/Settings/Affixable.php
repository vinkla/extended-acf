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

trait Affixable
{
    public function testSuffix()
    {
        $settings = $this->field::make($this->label('Suffix'))->suffix('%')->get();
        $this->assertSame('%', $settings['append']);
    }

    public function testPrefix()
    {
        $settings = $this->field::make($this->label('Prefix'))->prefix('$')->get();
        $this->assertSame('$', $settings['prepend']);
    }
}
