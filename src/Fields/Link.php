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

use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Wrapper;
use InvalidArgumentException;

class Link extends Field
{
    use ConditionalLogic;
    use Instructions;
    use Required;
    use Wrapper;

    protected string|null $type = 'link';

    /**
     * @param string $format array, url
     * @throws \InvalidArgumentException
     */
    public function format(string $format): static
    {
        if (!in_array($format, ['array', 'url'])) {
            throw new InvalidArgumentException("Invalid argument format [$format].");
        }

        $this->settings['return_format'] = $format;

        return $this;
    }
}
