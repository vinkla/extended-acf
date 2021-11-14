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

namespace WordPlate\Acf\Fields\Settings;

trait DateTimeFormat
{
    /** @see https://www.php.net/manual/en/datetime.format.php#refsect1-datetime.format-parameters */
    public function displayFormat(string $format): static
    {
        $this->settings['display_format'] = $format;

        return $this;
    }

    /** @see https://www.php.net/manual/en/datetime.format.php#refsect1-datetime.format-parameters */
    public function returnFormat(string $format): static
    {
        $this->settings['return_format'] = $format;

        return $this;
    }
}
