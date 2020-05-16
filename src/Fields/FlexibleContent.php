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

use WordPlate\Acf\Fields\Attributes\ButtonLabel;
use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class FlexibleContent extends Field
{
    use ButtonLabel;
    use ConditionalLogic;
    use Instructions;
    use MinMax;
    use Required;
    use Wrapper;

    protected $type = 'flexible_content';

    public function layouts(array $layouts): self
    {
        $this->config->set('layouts', $layouts);

        return $this;
    }
}
