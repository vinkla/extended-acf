<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Checkbox;

class CheckboxTest extends TestCase
{
    public function testType()
    {
        $field = Checkbox::make('Checkbox')->toArray();
        $this->assertSame('checkbox', $field['type']);
    }
}
