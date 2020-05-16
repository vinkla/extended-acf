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

use WordPlate\Acf\Fields\Attributes\Endpoint;
use WordPlate\Acf\Fields\Attributes\Instructions;

class Accordion extends Field
{
    use Endpoint;
    use Instructions;

    protected $type = 'accordion';

    public function multiExpand(): self
    {
        $this->config->set('multi_expand', true);

        return $this;
    }

    public function open(): self
    {
        $this->config->set('open', true);

        return $this;
    }
}
