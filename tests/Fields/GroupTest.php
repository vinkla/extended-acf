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

use Extended\ACF\Fields\Group;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\Fields;
use Extended\ACF\Tests\Fields\Settings\Instructions;
use Extended\ACF\Tests\Fields\Settings\Layout;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class GroupTest extends FieldTestCase
{
    use ConditionalLogic;
    use Fields;
    use Instructions;
    use Layout;
    use Required;
    use Wrapper;

    public string $field = Group::class;
    public string $type = 'group';
}
