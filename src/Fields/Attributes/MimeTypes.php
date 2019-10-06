<?php

declare(strict_types=1);

namespace WordPlate\Acf\Fields\Attributes;

trait MimeTypes
{
    public function mimeTypes(array $mimeTypes): self
    {
        $this->config->set('mime_types', implode(',', $mimeTypes));

        return $this;
    }
}
