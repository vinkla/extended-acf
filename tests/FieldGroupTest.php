<?php

declare(strict_types=1);

namespace WordPlate\Tests\Acf;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\FieldGroup;

/**
 * This is the acf test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class FieldGroupTest extends TestCase
{
    public function testRequiredKeys()
    {
        $config = ['title' => 'Employee', 'fields' => null, 'location' => null];
        $requiredKeys = array_keys($config);

        foreach ($requiredKeys as $key) {
            $this->expectException(InvalidArgumentException::class);
            $this->expectExceptionMessage("Missing field group configuration key [$key].");
            new FieldGroup(array_values(array_diff($config, [$key => null])));
        }
    }
}
