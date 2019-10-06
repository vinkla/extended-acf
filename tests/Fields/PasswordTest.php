<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Password;

class PasswordTest extends TestCase
{
    public function testType()
    {
        $field = Password::make('Password')->toArray();
        $this->assertSame('password', $field['type']);
    }
}
