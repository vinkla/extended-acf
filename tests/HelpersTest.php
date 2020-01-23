<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/acf
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf;

use PHPUnit\Framework\TestCase;

/**
 * This is the helpers test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class HelpersTest extends TestCase
{
    public function testRegisterExtendedFieldGroup()
    {
        $this->assertEmpty(register_extended_field_group([
            'title' => 'Helper',
            'fields' => [],
            'location' => [],
        ]));
    }

    /**
     * @runInSeparateProcess
     */
    public function testField()
    {
        require __DIR__ . '/functions.php';
        $this->assertSame('marty', field('marty', 11));
        $this->assertNull(field('marty'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testOption()
    {
        require __DIR__ . '/functions.php';
        $this->assertSame('marty', option('marty'));
    }

    /**
     * @runInSeparateProcess
     */
    public function testMissingGetFieldFunction()
    {
        $this->assertNull(field('field'));
        $this->assertNull(option('option'));
    }
}
