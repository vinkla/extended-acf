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

use WordPlate\Acf\Fields\Settings\CharacterLimit;
use WordPlate\Acf\Fields\Settings\ConditionalLogic;
use WordPlate\Acf\Fields\Settings\DefaultValue;
use WordPlate\Acf\Fields\Settings\Disabled;
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\NewLines;
use WordPlate\Acf\Fields\Settings\Placeholder;
use WordPlate\Acf\Fields\Settings\Writable;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\Wrapper;

class Textarea extends Field
{
    use CharacterLimit;
    use ConditionalLogic;
    use DefaultValue;
    use Disabled;
    use Instructions;
    use NewLines;
    use Placeholder;
    use Required;
    use Wrapper;
    use Writable;

    protected string|null $type = 'textarea';

    public function rows(int $rows): static
    {
        $this->settings['rows'] = $rows;

        return $this;
    }
}
