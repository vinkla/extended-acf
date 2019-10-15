<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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

/**
 * This is the page link field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class PageLink extends Field
{
    use ConditionalLogic, FilterBy, Instructions, Multiple, Nullable, Required, Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'page_link';

    /**
     * Allow archives to be listed.
     *
     * @return self
     */
    public function allowArchives(): self
    {
        $this->config->set('allow_archives', true);

        return $this;
    }
}
