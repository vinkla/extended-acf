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
use WordPlate\Acf\Fields\Attributes\FilterBy;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Relationship extends Field
{
    use ConditionalLogic;
    use FilterBy;
    use Instructions;
    use MinMax;
    use Required;
    use ReturnFormat;
    use Wrapper;

    protected string|null $type = 'relationship';

    public function elements(array $elements): static
    {
        $this->settings['elements'] = $elements;

        return $this;
    }

    public function filters(array $filters): static
    {
        $this->settings['filters'] = $filters;

        return $this;
    }
}
