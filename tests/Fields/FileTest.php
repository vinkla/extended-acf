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

use Extended\ACF\Fields\File;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\FileSize;
use Extended\ACF\Tests\Fields\Settings\FileTypes;
use Extended\ACF\Tests\Fields\Settings\Instructions;
use Extended\ACF\Tests\Fields\Settings\Library;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class FileTest extends FieldTestCase
{
    use ConditionalLogic;
    use FileSize;
    use FileTypes;
    use Instructions;
    use Library;
    use Required;
    use Wrapper;

    public string $field = File::class;
    public string $type = 'file';

    public function testFormat()
    {
        $field = File::make('File Format')->format('array')->get();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        File::make('Invalid Format')->format('test')->get();
    }
}
