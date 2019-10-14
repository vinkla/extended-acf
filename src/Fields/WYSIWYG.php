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

use InvalidArgumentException;
use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\DefaultValue;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Wysiwyg extends Field
{
    use ConditionalLogic, DefaultValue, Instructions, Required, Wrapper;

    protected $type = 'wysiwyg';

    public function mediaUpload(bool $mediaUpload): self
    {
        $this->config->set('media_upload', $mediaUpload);

        return $this;
    }

    public function tabs(string $tabs): self
    {
        if (!in_array($tabs, ['all', 'visual', 'text'])) {
            throw new InvalidArgumentException("Invalid argument tabs [$tabs].");
        }

        $this->config->set('tabs', $tabs);

        return $this;
    }

    public function toolbar(string $toolbar): self
    {
        $this->config->set('toolbar', $toolbar);

        return $this;
    }
}
