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

use Extended\ACF\Fields\Password;
use Extended\ACF\Tests\Fields\Settings\Affixable;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Immutable;
use Extended\ACF\Tests\Fields\Settings\Placeholder;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class PasswordTest extends FieldTestCase
{
    use Affixable;
    use ConditionalLogic;
    use HelperText;
    use Immutable;
    use Placeholder;
    use Required;
    use Wrapper;

    public string $field = Password::class;
    public string $type = 'password';
}
