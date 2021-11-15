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

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\FlexibleContent;
use WordPlate\Acf\Fields\Layout;
use WordPlate\Acf\Fields\Text;

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
