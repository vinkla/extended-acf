<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Select;

class SelectTest extends TestCase
{
    public function testType()
    {
        $field = Select::make('Select')->toArray();
        $this->assertSame('select', $field['type']);
    }
}
