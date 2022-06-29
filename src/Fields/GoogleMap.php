<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Fields;

use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\Height;
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Wrapper;

class GoogleMap extends Field
{
    use ConditionalLogic;
    use Height;
    use Instructions;
    use Required;
    use Wrapper;

    protected string|null $type = 'google_map';

    public function center(float $latitude, float $longitude): static
    {
        $this->settings['center_lat'] = $latitude;
        $this->settings['center_lng'] = $longitude;

        return $this;
    }

    public function zoom(int $zoom): static
    {
        $this->settings['zoom'] = $zoom;

        return $this;
    }
}
