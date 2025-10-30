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

use Extended\ACF\Fields\PostObject;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\FilterBy;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Multiple;
use Extended\ACF\Tests\Fields\Settings\Nullable;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class PostObjectTest extends FieldTestCase
{
    use ConditionalLogic;
    use FilterBy;
    use HelperText;
    use Multiple;
    use Nullable;
    use Required;
    use Wrapper;

    public string $field = PostObject::class;
    public string $type = 'post_object';

    public function testFormat()
    {
        $field = PostObject::make('Post Object Format')->format('id')->toArray();
        $this->assertSame('id', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        PostObject::make('Invalid Format')->format('test')->toArray();
    }
}
