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

namespace WordPlate\Tests\Acf\Attributes;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Attributes\Layout;

/**
 * This is the layout test class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class LayoutTest extends TestCase
{
    public function testGetKey()
    {
        $layout = $this->getLayout();

        $this->assertSame('group_block', $layout->getKey());
    }

    public function testToArary()
    {
        $layout = $this->getLayout();

        $this->assertSame([
            'name' => 'block',
            'label' => 'Block',
            'sub_fields' => [
                [
                    'name' => 'text',
                    'label' => 'Text',
                    'type' => 'text',
                    'key' => 'field_3deb5ed4',
                ],
            ],
            'key' => 'layout_d8e82a5e',
        ], $layout->toArray());
    }

    protected function getLayout()
    {
        $layout = new Layout([
            'name' => 'block',
            'label' => 'Block',
            'sub_fields' => [
                acf_text([
                    'name' => 'text',
                    'label' => 'Text',
                ]),
            ],
        ]);

        $layout->setParentKey('group');

        return $layout;
    }
}
