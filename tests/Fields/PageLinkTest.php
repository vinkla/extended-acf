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

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\PageLink;
use PHPUnit\Framework\TestCase;

class PageLinkTest extends TestCase
{
    public function testType()
    {
        $field = PageLink::make('Page Link')->get();
        $this->assertSame('page_link', $field['type']);
    }

    public function testAllowArchives()
    {
        $field = PageLink::make('Page Link Archives')->allowArchives()->get();
        $this->assertTrue($field['allow_archives']);
    }

    public function testDisallowArchives()
    {
        $field = PageLink::make('Page Link Non-archives')->allowArchives(false)->get();
        $this->assertFalse($field['allow_archives']);
    }
}
