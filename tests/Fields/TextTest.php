<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Text;

class TextTest extends TestCase
{
    public function testType()
    {
        $field = Text::make('Occupation')->toArray();
        $this->assertSame('text', $field['type']);
    }
}
