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
use WordPlate\Acf\Fields\Attributes\Multiple;
use WordPlate\Acf\Fields\Attributes\Nullable;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class PageLink extends Field
{
    use ConditionalLogic;
    use FilterBy;
    use Instructions;
    use Multiple;
    use Nullable;
    use Required;
    use Wrapper;

    protected $type = 'page_link';

    public function allowArchives(bool $value = true): self
    {
        $this->config->set('allow_archives', $value);

        return $this;
    }
}
