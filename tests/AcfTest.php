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

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Acf;

/**
 * This is the acf test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class AcfTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing field setting key [label].
     */
    public function testFieldMissingKey()
    {
        require __DIR__.'/stubs/functions.php';

        Acf::field('text', ['name' => 'without_label']);
    }
}
