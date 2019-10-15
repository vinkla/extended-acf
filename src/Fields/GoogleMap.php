<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\Height;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

/**
 * This is the google map field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class GoogleMap extends Field
{
    use ConditionalLogic, Height, Instructions, Required, Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'google_map';

    /**
     * Set the center of the map.
     *
     * @param float $latitude
     * @param float $longitude
     *
     * @return self
     */
    public function center(float $latitude, float $longitude): self
    {
        $this->config->set('center_lat', $latitude);
        $this->config->set('center_lng', $longitude);

        return $this;
    }

    /**
     * Set the zoom level of the map.
     *
     * @param int $zoom
     *
     * @return self
     */
    public function zoom(int $zoom): self
    {
        $this->config->set('zoom', $zoom);

        return $this;
    }
}
