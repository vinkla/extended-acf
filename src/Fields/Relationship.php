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

use WordPlate\Acf\Fields\Settings\ConditionalLogic;
use WordPlate\Acf\Fields\Settings\FilterBy;
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\MinMax;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\ReturnFormat;
use WordPlate\Acf\Fields\Settings\Wrapper;

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
