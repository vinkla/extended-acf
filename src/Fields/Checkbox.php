<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information; use please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use InvalidArgumentException;
use WordPlate\Acf\Fields\Attributes\Choices;
use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\DefaultValue;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Checkbox extends Field
{
    use Choices;
    use DefaultValue;
    use ConditionalLogic;
    use Instructions;
    use Required;
    use ReturnFormat;
    use Wrapper;

    protected $type = 'checkbox';

    public function layout(string $layout): self
    {
        if (!in_array($layout, ['vertical', 'horizontal'])) {
            throw new InvalidArgumentException("Invalid argument layout [$layout].");
        }

        $this->config->set('layout', $layout);

        return $this;
    }
}
