<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\PageLink;

class PageLinkTest extends TestCase
{
    public function testType()
    {
        $field = PageLink::make('Page Link')->toArray();
        $this->assertSame('page_link', $field['type']);
    }

    public function testAllowArchives()
    {
        $field = PageLink::make('Page Link Archives')->allowArchives()->toArray();
        $this->assertTrue($field['allow_archives']);
    }
}
