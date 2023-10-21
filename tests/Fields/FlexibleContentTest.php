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

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\Text;
use PHPUnit\Framework\TestCase;

class FlexibleContentTest extends TestCase
{
    public function testType()
    {
        $field = FlexibleContent::make('Flexible Content')->get();
        $this->assertSame('flexible_content', $field['type']);
    }

    public function testLabels()
    {
        $field = FlexibleContent::make('Flexible Content Labels')->layouts([])->get();
        $this->assertSame([], $field['layouts']);
    }

    public function testLayouts()
    {
        $field = FlexibleContent::make('Flexible Content Layouts')
            ->layouts([
                Layout::make('Image')
                    ->fields([
                        Text::make('Title'),
                    ]),
            ])
            ->get();

        $this->assertSame('Image', $field['layouts'][0]['label']);
        $this->assertSame('Title', $field['layouts'][0]['sub_fields'][0]['label']);
    }
}
