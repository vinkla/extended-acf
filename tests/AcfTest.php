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
     */
    public function testKeyDuplication()
    {
        require __DIR__.'/stubs/functions.php';

        Acf::group(['key' => 'group_test', 'title' => 1, 'fields' => [
            acf_text(['name' => 'test', 'label' => 'test']),
            acf_text(['name' => 'test', 'label' => 'test']),
        ]]);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testGroupMissingTitleKey()
    {
        require __DIR__.'/stubs/functions.php';

        Acf::group(['key' => 'group_without_title']);
    }
}
