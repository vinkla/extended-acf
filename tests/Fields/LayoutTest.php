<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Layout;

class LayoutTest extends TestCase
{
    public function testDisplay()
    {
        $layout = Layout::make('Layout')->layout('block')->toArray();
        $this->assertSame('block', $layout['display']);
    }
}
