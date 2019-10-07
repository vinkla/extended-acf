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

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Email;

class EmailTest extends TestCase
{
    public function testType()
    {
        $field = Email::make('Email Address')->toArray();
        $this->assertSame('email', $field['type']);
    }
}
