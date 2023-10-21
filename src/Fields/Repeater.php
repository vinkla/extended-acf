<?php

/**
 * Copyright (c) Vincent Klaiber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Fields;

use Extended\ACF\Fields\Settings\ButtonLabel;
use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\Fields;
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\Layout;
use Extended\ACF\Fields\Settings\MinMax;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Wrapper;

class Repeater extends Field
{
    use ButtonLabel;
    use ConditionalLogic;
    use Fields;
    use Instructions;
    use Layout;
    use MinMax;
    use Required;
    use Wrapper;

    protected string|null $type = 'repeater';

    public function collapsed(string $name): static
    {
        $this->settings['collapsed'] = $name;

        return $this;
    }

    public function pagination(int $perPage = 20): static
    {
        $this->settings['pagination'] = true;
        $this->settings['rows_per_page'] = $perPage;

        return $this;
    }
}
