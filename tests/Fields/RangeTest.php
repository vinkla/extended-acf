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

use Extended\ACF\Fields\Range;
use Extended\ACF\Tests\Fields\Settings\Affixable;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\DefaultValue;
use Extended\ACF\Tests\Fields\Settings\Disabled;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Immutable;
use Extended\ACF\Tests\Fields\Settings\MinMax;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Step;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class RangeTest extends FieldTestCase
{
    use Affixable;
    use ConditionalLogic;
    use DefaultValue;
    use Disabled;
    use HelperText;
    use Immutable;
    use MinMax;
    use Required;
    use Step;
    use Wrapper;

    public string $field = Range::class;
    public string $type = 'range';
}
