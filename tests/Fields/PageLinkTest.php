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
use WordPlate\Acf\Fields\PageLink;

class PageLinkTest extends TestCase
{
    public function testType()
    {
        $field = PageLink::make('Page Link')->getSettings();
        $this->assertSame('page_link', $field['type']);
    }

    public function testAllowArchives()
    {
        $field = PageLink::make('Page Link Archives')->allowArchives()->getSettings();
        $this->assertTrue($field['allow_archives']);
    }

    public function testDisallowArchives()
    {
        $field = PageLink::make('Page Link Non-archives')->allowArchives(false)->getSettings();
        $this->assertFalse($field['allow_archives']);
    }
}
