<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use PHPUnit\Framework\TestCase;
use Symfony\Component\String\ByteString;

abstract class FieldTestCase extends TestCase
{
    public $field;

    public function getClass()
    {
        return array_pop(explode('\\', $this->field));
    }

    public function getLabel($label)
    {
        return sprintf('%s %s', $this->getClass(), $label);
    }

    public function testType()
    {
        $type = (string) (new ByteString($this->getClass()))->snake();
        $field = $this->field::make($this->getClass())->toArray();
        $this->assertSame($type, $field['type']);
    }
}
