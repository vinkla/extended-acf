<?php

/**
 * Copyright (c) Vincent Klaiber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\Field;
use PHPUnit\Framework\TestCase;

class FieldTestCase extends TestCase
{
    public string $field;
    public string $type;

    protected function make(string $label): Field
    {
        $exploded = explode('\\', $this->field);
        $className = end($exploded);

        return $this->field::make($className . ' ' . $label);
    }

    public function testType()
    {
        $settings = $this->make($this->type)->toArray();
        $this->assertSame($this->type, $settings['type']);
    }
}
