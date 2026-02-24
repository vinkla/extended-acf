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

trait FileTypes
{
    public function testAcceptedFileTypes()
    {
        $field = $this->make('Accepted File Types')->acceptedFileTypes(['jpg', 'pdf'])->toArray();
        $this->assertSame('jpg,pdf', $field['mime_types']);
    }
}
