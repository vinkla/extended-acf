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

namespace WordPlate\Acf\Fields\Attributes;

/**
 * This is the mime type trait.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
trait MimeTypes
{
    /**
     * Set the allowed file types.
     *
     * @param array $mimeTypes
     *
     * @return self
     */
    public function mimeTypes(array $mimeTypes): self
    {
        $this->config->set('mime_types', implode(',', $mimeTypes));

        return $this;
    }
}
