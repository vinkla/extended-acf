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
use Extended\ACF\Fields\Settings\FilterBy;
use Extended\ACF\Fields\Settings\HelperText;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\Wrapper;
use InvalidArgumentException;

class Relationship extends Field
{
    use ConditionalLogic;
    use FilterBy;
    use HelperText;
    use Required;
    use Wrapper;

    protected string|null $type = 'relationship';

    public function elements(array $elements): static
    {
        $this->settings['elements'] = $elements;

        return $this;
    }

    public function filters(array $filters): static
    {
        $this->settings['filters'] = $filters;

        return $this;
    }

    /**
     * @param string $format id, object
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

    public function maxPosts(int $count): static
    {
        $this->settings['max'] = $count;

        return $this;
    }

    public function minPosts(int $count): static
    {
        $this->settings['min'] = $count;

        return $this;
    }
}
