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
use Extended\ACF\Tests\Fields\Settings\Instructions;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\ReturnFormat;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class LinkTest extends FieldTestCase
{
    use ConditionalLogic;
    use Instructions;
    use Required;
    use ReturnFormat;
    use Wrapper;

    public string $field = Link::class;
    public string $type = 'link';
}
