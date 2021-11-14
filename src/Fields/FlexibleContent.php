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

use WordPlate\Acf\Fields\Settings\ButtonLabel;
use WordPlate\Acf\Fields\Settings\ConditionalLogic;
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\MinMax;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\Wrapper;

class FlexibleContent extends Field
{
    use ButtonLabel;
    use ConditionalLogic;
    use Instructions;
    use MinMax;
    use Required;
    use Wrapper;

    protected string|null $type = 'flexible_content';

    public function layouts(array $layouts): static
    {
        $this->settings['layouts'] = $layouts;

        return $this;
    }
}
