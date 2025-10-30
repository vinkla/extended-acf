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

use Extended\ACF\Fields\Image;
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

class ImageTest extends FieldTestCase
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

    public string $field = Image::class;
    public string $type = 'image';

    public function testFormat()
    {
        $field = Image::make('Image Format')->format('array')->toArray();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        Image::make('Invalid Format')->format('test')->toArray();
    }
}
