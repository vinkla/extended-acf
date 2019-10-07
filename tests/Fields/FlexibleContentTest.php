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
use WordPlate\Acf\Fields\FlexibleContent;

class FlexibleContentTest extends TestCase
{
    public function testType()
    {
        $field = FlexibleContent::make('Flexible Content')->toArray();
        $this->assertSame('flexible_content', $field['type']);
    }

    public function testLabels()
    {
        $field = FlexibleContent::make('Flexible Content Labels')->layouts([1])->toArray();
        $this->assertSame([1], $field['layouts']);
    }
}
