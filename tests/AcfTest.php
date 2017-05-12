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

    public function testGroup()
    {
        require __DIR__.'/stubs/functions.php';

        $fields = [
            acf_image(['name' => 'image', 'label' => 'Image']),
            acf_text(['name' => 'title', 'label' => 'Title']),
        ];

        $location = [
            acf_location('post_type', 'post'),
            acf_location('post_type', '!=', 'page'),
        ];

        $group = Acf::group([
            'title' => 'About',
            'key' => 'group_about',
            'fields' => $fields,
            'location' => [
                $location,
            ],
        ]);

        $this->assertNull($group);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAcfFieldGroupPrefix()
    {
        require __DIR__.'/stubs/functions.php';

        Acf::group(['key' => 'without_group_']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testAcfFieldGroupMissingTitle()
    {
        require __DIR__.'/stubs/functions.php';

        Acf::group(['key' => 'group_without_title']);
    }
}
