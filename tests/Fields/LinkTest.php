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

use Extended\ACF\Fields\Link;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class LinkTest extends FieldTestCase
{
    use ConditionalLogic;
    use HelperText;
    use Required;
    use Wrapper;

    public string $field = Link::class;
    public string $type = 'link';

    public function testFormat()
    {
        $field = Link::make('Link Format')->format('array')->toArray();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        Link::make('Invalid Format')->format('test')->toArray();
    }
}
