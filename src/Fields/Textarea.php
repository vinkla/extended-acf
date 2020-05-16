<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\CharacterLimit;
use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\DefaultValue;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\NewLines;
use WordPlate\Acf\Fields\Attributes\Placeholder;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Textarea extends Field
{
    use CharacterLimit;
    use ConditionalLogic;
    use DefaultValue;
    use Instructions;
    use NewLines;
    use Placeholder;
    use Required;
    use Wrapper;

    protected $type = 'textarea';

    public function rows(int $rows): self
    {
        $this->config->set('rows', $rows);

        return $this;
    }
}
