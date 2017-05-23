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
    public function testMissingFunction()
    {
        $this->assertNull(Acf::group([]));
    }

    /**
     * @runInSeparateProcess
     */
    public function testGroup()
    {
        require __DIR__.'/stubs/functions.php';

        $settings = require __DIR__.'/stubs/settings.php';

        $this->assertNull(Acf::group($settings));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing field setting key [label].
     */
    public function testFieldMissingKey()
    {
        require __DIR__.'/stubs/functions.php';

        Acf::field('text', ['name' => 'without_label']);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Missing group setting key [title].
     */
    public function testGroupMissingKey()
    {
        require __DIR__.'/stubs/functions.php';

        Acf::group(['key' => 'without_title']);
    }
}
