<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields;

use WordPlate\Acf\Fields\Attributes\FilterBy;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Multiple;
use WordPlate\Acf\Fields\Attributes\Nullable;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class PageLink extends Field
{
    use FilterBy, Instructions, Multiple, Nullable, Required, Wrapper;

    protected $type = 'page_link';

    public function allowArchives(): self
    {
        $this->config->set('allow_archives', true);

        return $this;
    }
}
