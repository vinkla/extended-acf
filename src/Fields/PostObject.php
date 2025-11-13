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

use Extended\ACF\Fields\Settings\Bidirectional;
use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\FilterBy;
use Extended\ACF\Fields\Settings\HelperText;
use Extended\ACF\Fields\Settings\Multiple;
use Extended\ACF\Fields\Settings\Nullable;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Wrapper;
use InvalidArgumentException;

class PostObject extends Field
{
    use ConditionalLogic;
    use Bidirectional;
    use FilterBy;
    use HelperText;
    use Multiple;
    use Nullable;
    use Required;
    use Wrapper;

    protected ?string $type = 'post_object';

    /**
     * @param string $format id, object (default)
     * @throws \InvalidArgumentException
     */
    public function format(string $format): static
    {
        if (!in_array($format, ['id', 'object'])) {
            throw new InvalidArgumentException("Invalid argument format [$format].");
        }

        $this->settings['return_format'] = $format;

        return $this;
    }
}
