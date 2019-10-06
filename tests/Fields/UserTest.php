<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\User;

class UserTest extends TestCase
{
    public function testType()
    {
        $field = User::make('User')->toArray();
        $this->assertSame('user', $field['type']);
    }

    public function testFilterByPostType()
    {
        $field = User::make('User Filter Role')->filterByRole(['editor'])->toArray();
        $this->assertSame(['editor'], $field['role']);
    }
}
