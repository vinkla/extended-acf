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
use WordPlate\Acf\Fields\Attributes\Instructions;
use WordPlate\Acf\Fields\Attributes\Multiple;
use WordPlate\Acf\Fields\Attributes\Nullable;
use WordPlate\Acf\Fields\Attributes\Required;
use WordPlate\Acf\Fields\Attributes\ReturnFormat;
use WordPlate\Acf\Fields\Attributes\Wrapper;

/**
 * This is the user field class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class User extends Field
{
    use ConditionalLogic, Instructions, Multiple, Nullable, Required, ReturnFormat, Wrapper;

    /**
     * The field type.
     *
     * @var string
     */
    protected $type = 'user';

    /**
     * Filter users by roles.
     *
     * @param array $roles
     *
     * @return self
     */
    public function roles(array $roles): self
    {
        $this->config->set('role', $roles);

        return $this;
    }
}
