<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Layout;

/**
 * This is the layout test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class LayoutTest extends TestCase
{
    public function testGetKeyError()
    {
        $this->expectException(InvalidArgumentException::class);

        $layout = new Layout([
            'display' => 'block',
            'label' => 'Layout',
            'name' => 'layout',
        ]);

        $layout->setParentKey('employee');

        $layout->getKey();
        $layout->getKey();
    }
}
