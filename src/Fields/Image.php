<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Fields;

use Extended\ACF\Fields\Settings\ConditionalLogic;
use Extended\ACF\Fields\Settings\Dimensions;
use Extended\ACF\Fields\Settings\FileSize;
use Extended\ACF\Fields\Settings\FileTypes;
use Extended\ACF\Fields\Settings\Instructions;
use Extended\ACF\Fields\Settings\Library;
use Extended\ACF\Fields\Settings\PreviewSize;
use Extended\ACF\Fields\Settings\Required;
use Extended\ACF\Fields\Settings\ReturnFormat;
use Extended\ACF\Fields\Settings\Wrapper;

class Image extends Field
{
    use ConditionalLogic;
    use Dimensions;
    use FileSize;
    use Instructions;
    use Library;
    use FileTypes;
    use PreviewSize;
    use Required;
    use ReturnFormat;
    use Wrapper;

    protected string|null $type = 'image';
}
