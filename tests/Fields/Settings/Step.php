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

trait Step
{
    public function testStep()
    {
        $field = $this->make('Step')->step(5.2)->toArray();
        $this->assertSame(5.2, $field['step']);
    }
}
