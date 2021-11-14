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

use WordPlate\Acf\Fields\Settings\Endpoint;
use WordPlate\Acf\Fields\Settings\Instructions;

class Accordion extends Field
{
    use Endpoint;
    use Instructions;

    protected string|null $type = 'accordion';

    public function multiExpand(): static
    {
        $this->settings['multi_expand'] = true;

        return $this;
    }

    public function open(): static
    {
        $this->settings['open'] = true;

        return $this;
    }
}
