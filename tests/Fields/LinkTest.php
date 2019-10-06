<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Link;

class LinkTest extends TestCase
{
    public function testType()
    {
        $field = Link::make('Link')->toArray();
        $this->assertSame('link', $field['type']);
    }
}
