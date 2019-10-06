<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Email;

class EmailTest extends TestCase
{
    public function testType()
    {
        $field = Email::make('Email Address')->toArray();
        $this->assertSame('email', $field['type']);
    }
}
