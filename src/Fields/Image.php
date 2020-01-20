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
use WordPlate\Acf\Fields\Attributes\Dimensions;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Library;
use WordPlate\Acf\Fields\Attributes\MimeTypes;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

/**
 * This is the email field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class Image extends Field
{
    use ConditionalLogic;
    use Dimensions;
    use Instructions;
    use Library;
    use MimeTypes;
    use Required;
    use ReturnFormat;
    use Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'image';

    /**
     * Set the preview size.
     *
     * @param string $size
     *
     * @return self
     */
    public function previewSize(string $size): self
    {
        $this->config->set('preview_size', $size);

        return $this;
    }
}
