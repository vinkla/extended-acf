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

namespace WordPlate\Tests\Acf;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    public function testRegisterExtendedFieldGroup()
    {
        $this->assertEmpty(register_extended_field_group([
            'title' => 'Helper',
            'fields' => [],
            'location' => [],
        ]));
    }
}
