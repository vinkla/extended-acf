<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Key;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class FieldTestCase extends TestCase
{
    public string $field;
    public string $type;

    protected function label(string $label): string
    {
        $exploded = explode('\\', $this->field);
        $className = end($exploded);

        return $className . ' ' . $label;
    }

    public function testType()
    {
        $settings = $this->field::make($this->type)->get();
        $this->assertSame($this->type, $settings['type']);
    }

    public function testLabel()
    {
        $field = $this->field::make($this->label('Name'))->get();
        $this->assertSame($this->label('Name'), $field['label']);
    }

    public function testName()
    {
        $name = Key::sanitize($this->label('Name 1'));
        $field = $this->field::make($this->label('Name 1'))->get();
        $this->assertSame($name, $field['name']);

        $name = Key::sanitize($this->label('Name 2'));
        $field = $this->field::make($this->label('Name 2'), $name)->get();
        $this->assertSame($name, $field['name']);
    }

    public function testKey()
    {
        $label = $this->label('Key');
        $name = Key::sanitize($label);
        $key = 'field_' . Key::hash('_' . $name); // prefix with an underscore by default when there is no parent key

        $field = $this->field::make($label)->get();
        $this->assertSame($key, $field['key']);
    }

    public function testCustomKey()
    {
        $key = Key::sanitize($this->label('Custom Key'));
        $field = $this->field::make($this->label('Custom Key'))->key('field_' . $key)->get();
        $this->assertSame('field_' . $key, $field['key']);
    }

    public function testKeyUniqueness()
    {
        $this->expectExceptionMessage('The key [field_16217cde] is not unique.');
        $this->field::make($this->label('Key Uniqueness 1'))->key('field_16217cde');
        $this->field::make($this->label('Key Uniqueness 2'))->key('field_16217cde');
    }

    public function testKeyPrefix()
    {
        $this->expectExceptionMessage('The key should have the prefix [field_].');
        $this->field::make($this->label('Key Prefix'))->key('phone')->get();
    }

    public function testWithSettings()
    {
        $field = $this->field::make($this->label('With Settings'))->withSettings(['custom' => 'setting'])->get();
        $this->assertSame('setting', $field['custom']);

        $this->expectException(InvalidArgumentException::class);
        $this->field::make($this->label('With Settings Label'))->withSettings(['label' => 'invalid'])->get();
    }
}
