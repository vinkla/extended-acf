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

use InvalidArgumentException;
use WordPlate\Acf\Fields\Settings\ConditionalLogic;
use WordPlate\Acf\Fields\Settings\DefaultValue;
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\Wrapper;

class WysiwygEditor extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use Instructions;
    use Required;
    use Wrapper;

    protected string|null $type = 'wysiwyg';

    public function delay(): static
    {
        $this->settings['delay'] = true;

        return $this;
    }

    public function mediaUpload(bool $mediaUpload): static
    {
        $this->settings['media_upload'] = $mediaUpload;

        return $this;
    }

    /**
     * @param string $tabs all, visual or text
     * @throws \InvalidArgumentException
     */
    public function tabs(string $tabs): static
    {
        if (!in_array($tabs, ['all', 'visual', 'text'])) {
            throw new InvalidArgumentException("Invalid argument tabs [$tabs].");
        }

        $this->settings['tabs'] = $tabs;

        return $this;
    }

    public function toolbar(string $toolbar): static
    {
        $this->settings['toolbar'] = $toolbar;

        return $this;
    }
}
