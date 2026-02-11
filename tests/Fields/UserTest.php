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

use Extended\ACF\Fields\User;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Multiple;
use Extended\ACF\Tests\Fields\Settings\Nullable;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class UserTest extends FieldTestCase
{
    use ConditionalLogic;
    use HelperText;
    use Multiple;
    use Nullable;
    use Required;
    use Wrapper;

    public string $field = User::class;
    public string $type = 'user';

    public function testFormat()
    {
        $field = User::make('Format')->format('array')->toArray();
        $this->assertSame('array', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        User::make('Invalid Format')->format('test')->toArray();
    }

    public function testRoles()
    {
        $field = User::make('User Filter Role')->roles(['editor'])->toArray();
        $this->assertSame(['editor'], $field['role']);
    }
}
