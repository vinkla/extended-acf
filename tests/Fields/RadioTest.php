<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Radio;

class RadioTest extends TestCase
{
    public function testType()
    {
        $field = Radio::make('Radio')->toArray();
        $this->assertSame('radio', $field['type']);
    }
}
