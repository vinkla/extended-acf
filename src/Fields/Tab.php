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

use InvalidArgumentException;
use WordPlate\Acf\Fields\Attributes\Endpoint;

class Tab extends Field
{
    use Endpoint;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'tab';

    /**
     * Set the placement position.
     *
     * @param string $placement
     *
     * @return self
     */
    public function placement(string $placement): self
    {
        if (!in_array($placement, ['left', 'top'])) {
            throw new InvalidArgumentException("Invalid argument placement [$placement].");
        }

        $this->config->set('placement', $placement);

        return $this;
    }
}
