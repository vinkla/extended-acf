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

use WordPlate\Acf\Fields\Attributes\ButtonLabel;
use WordPlate\Acf\Fields\Attributes\ConditionalLogic;
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Layout;
use WordPlate\Acf\Fields\Attributes\MinMax;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\SubFields;
use WordPlate\Acf\Fields\Attributes\Wrapper;

/**
 * This is the repeater field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class Repeater extends Field
{
    use ButtonLabel;
    use ConditionalLogic;
    use Instructions;
    use Layout;
    use MinMax;
    use SubFields;
    use Required;
    use Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'repeater';

    /**
     * Select a sub field to show when row is collapsed.
     *
     * @param string $name
     *
     * @return self
     */
    public function collapsed(string $name): self
    {
        $this->config->set('collapsed', $name);

        return $this;
    }
}
