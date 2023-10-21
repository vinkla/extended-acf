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

use Extended\ACF\Fields\Text;
use Symfony\Component\VarDumper\VarDumper;

class TextTest extends FieldTestCase
{
    public string $field = Text::class;
    public string $type = 'text';

    public function testDisabled()
    {
        $field = Text::make('Text Disabled')->disabled()->get();
        $this->assertTrue($field['disabled']);
    }

    public function testDump()
    {
        $log = [];

        VarDumper::setHandler(function ($value) use (&$log) {
            $log[] = $value;
        });

        Text::make('Dump')->dump(1, 2);

        $this->assertSame([['label' => 'Dump', 'name' => 'dump', 'type' => 'text', 'key' => 'field_076f7d8c'], 1, 2], $log);

        VarDumper::setHandler(null);
    }
}
