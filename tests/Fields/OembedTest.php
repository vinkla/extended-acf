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

use Extended\ACF\Fields\Oembed;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\Height;
use Extended\ACF\Tests\Fields\Settings\Instructions;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class OembedTest extends FieldTestCase
{
    use ConditionalLogic;
    use Height;
    use Instructions;
    use Required;
    use Wrapper;

    public string $field = Oembed::class;
    public string $type = 'oembed';

    public function testWidth()
    {
        $field = Oembed::make('Width')->width(200)->get();
        $this->assertSame(200, $field['width']);
    }
}
