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

namespace Extended\ACF\Tests\Fields\Settings;

trait Affixable
{
    public function testAppend()
    {
        $settings = $this->field::make($this->label('Append'))->append('%')->get();
        $this->assertSame('%', $settings['append']);
    }

    public function testPrepend()
    {
        $settings = $this->field::make($this->label('Prepend'))->prepend('$')->get();
        $this->assertSame('$', $settings['prepend']);
    }
}
