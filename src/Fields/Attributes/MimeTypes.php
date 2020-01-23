<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

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
