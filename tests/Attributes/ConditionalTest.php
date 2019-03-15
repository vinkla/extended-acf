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

namespace WordPlate\Tests\Acf\Attributes;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Attributes\Conditional;

/**
 * This is the conditional test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class ConditionalTest extends TestCase
{
    public function testToArray()
    {
        $conditional = new Conditional([
            acf_conditional('type', '!=', 'document'),
        ], 'video');

        $this->assertSame([
            [
                'field' => 'field_b1c7aea1',
                'operator' => '!=',
                'value' => 'document',
            ],
        ], $conditional->toArray());
    }
}
