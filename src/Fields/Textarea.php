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
use WordPlate\Acf\Fields\Attributes\DefaultValue;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\NewLines;
use WordPlate\Acf\Fields\Attributes\Placeholder;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\Wrapper;

class Textarea extends Field
{
    use ConditionalLogic;
    use DefaultValue;
    use Instructions;
    use NewLines;
    use Placeholder;
    use Required;
    use Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'textarea';

    /**
     * Set the maximum character limit.
     *
     * @param int $limit
     *
     * @return self
     */
    public function characterLimit(int $limit): self
    {
        $this->config->set('maxlength', $limit);

        return $this;
    }

    /**
     * Set the default number of rows.
     *
     * @param int $rows
     *
     * @return self
     */
    public function rows(int $rows): self
    {
        $this->config->set('rows', $rows);

        return $this;
    }
}
