<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Fields;

use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\FilterBy;
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\MinMax;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\ReturnFormat;
use Extended\ACF\Fields\Settings\Wrapper;

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
