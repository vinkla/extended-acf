<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\Height;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class GoogleMap extends Field
{
    use ConditionalLogic;
    use Height;
    use Instructions;
    use Required;
    use Wrapper;

    protected $type = 'google_map';

    public function center(float $latitude, float $longitude): self
    {
        $this->config->set('center_lat', $latitude);
        $this->config->set('center_lng', $longitude);

        return $this;
    }

    public function zoom(int $zoom): self
    {
        $this->config->set('zoom', $zoom);

        return $this;
    }
}
