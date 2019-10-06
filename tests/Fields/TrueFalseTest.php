<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\TrueFalse;

class TrueFalseTest extends TestCase
{
    public function testType()
    {
        $field = TrueFalse::make('True False')->toArray();
        $this->assertSame('true_false', $field['type']);
    }

    public function testUi()
    {
        $field = TrueFalse::make('UI')->ui()->toArray();
        $this->assertTrue($field['ui']);
    }
}
