<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\Height;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class GoogleMap extends Field
{
    use Height, Instructions, Required, Wrapper;

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
