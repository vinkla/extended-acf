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

use InvalidArgumentException;
use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\Endpoint;

class Tab extends Field
{
    use ConditionalLogic;
    use Endpoint;

    protected $type = 'tab';

    public function placement(string $placement): self
    {
        if (!in_array($placement, ['left', 'top'])) {
            throw new InvalidArgumentException("Invalid argument placement [$placement].");
        }

        $this->config->set('placement', $placement);

        return $this;
    }
}
