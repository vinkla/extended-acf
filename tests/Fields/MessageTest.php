<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Message;

class MessageTest extends TestCase
{
    public function testType()
    {
        $field = Message::make('Message')->toArray();
        $this->assertSame('message', $field['type']);
    }

    public function testEscapeHtml()
    {
        $field = Message::make('Message Escape HTML')->escapeHtml()->toArray();
        $this->assertTrue($field['esc_html']);
    }

    public function testMessage()
    {
        $field = Message::make('Message Content')->message('The Content')->toArray();
        $this->assertSame('The Content', $field['message']);
    }
}
