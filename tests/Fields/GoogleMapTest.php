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

use Extended\ACF\Fields\GoogleMap;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\Height;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class GoogleMapTest extends FieldTestCase
{
    use ConditionalLogic;
    use Height;
    use HelperText;
    use Required;
    use Wrapper;

    public string $field = GoogleMap::class;
    public string $type = 'google_map';

    public function testCenter()
    {
        $field = GoogleMap::make('Google Map Center')->center(11.11, 22.22)->toArray();
        $this->assertSame(11.11, $field['center_lat']);
        $this->assertSame(22.22, $field['center_lng']);
    }

    public function testZoom()
    {
        $field = GoogleMap::make('Google Map Zoom')->zoom(14)->toArray();
        $this->assertSame(14, $field['zoom']);
    }
}
