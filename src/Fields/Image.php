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

use WordPlate\Acf\Fields\Settings\ConditionalLogic;
use WordPlate\Acf\Fields\Settings\Dimensions;
use WordPlate\Acf\Fields\Settings\FileSize;
use WordPlate\Acf\Fields\Settings\Instructions;
use WordPlate\Acf\Fields\Settings\Library;
use WordPlate\Acf\Fields\Settings\MimeTypes;
use WordPlate\Acf\Fields\Settings\PreviewSize;
use WordPlate\Acf\Fields\Settings\Required;
use WordPlate\Acf\Fields\Settings\ReturnFormat;
use WordPlate\Acf\Fields\Settings\Wrapper;

class Image extends Field
{
    use ConditionalLogic;
    use Dimensions;
    use FileSize;
    use Instructions;
    use Library;
    use MimeTypes;
    use PreviewSize;
    use Required;
    use ReturnFormat;
    use Wrapper;

    protected string|null $type = 'image';
}
