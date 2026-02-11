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

use Extended\ACF\Fields\Gallery;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\Dimensions;
use Extended\ACF\Tests\Fields\Settings\FileSize;
use Extended\ACF\Tests\Fields\Settings\FileTypes;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Library;
use Extended\ACF\Tests\Fields\Settings\PreviewSize;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class GalleryTest extends FieldTestCase
{
    use ConditionalLogic;
    use Dimensions;
    use FileSize;
    use FileTypes;
    use HelperText;
    use Library;
    use PreviewSize;
    use Required;
    use Wrapper;

    public string $field = Gallery::class;
    public string $type = 'gallery';

    public function testFormat()
    {
        $field = Gallery::make('Gallery Format')->format('array')->toArray();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        Gallery::make('Invalid Format')->format('test')->toArray();
    }

    public function testMaxFiles()
    {
        $field = Gallery::make('Max Files')->maxFiles(10)->toArray();
        $this->assertSame(10, $field['max']);
    }

    public function testMinFiles()
    {
        $field = Gallery::make('Min Files')->minFiles(5)->toArray();
        $this->assertSame(5, $field['min']);
    }

    public function testPrependFiles()
    {
        $field = Gallery::make('Prepend Files')->prependFiles()->toArray();
        $this->assertSame('prepend', $field['insert']);
    }
}
