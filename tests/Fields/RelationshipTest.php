<?php

/**
 * Copyright (c) Vincent Klaiber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/vinkla/extended-acf
 */

declare(strict_types=1);

namespace Extended\ACF\Tests\Fields;

use Extended\ACF\Fields\Relationship;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\FilterBy;
use Extended\ACF\Tests\Fields\Settings\Instructions;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\ReturnFormat;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class RelationshipTest extends FieldTestCase
{
    use ConditionalLogic;
    use FilterBy;
    use Instructions;
    use Required;
    use ReturnFormat;
    use Wrapper;

    public string $field = Relationship::class;
    public string $type = 'relationship';

    public function testElements()
    {
        $field = Relationship::make('Elements')->elements(['featured_image'])->get();
        $this->assertSame(['featured_image'], $field['elements']);
    }

    public function testFilters()
    {
        $field = Relationship::make('Filters')->filters(['search'])->get();
        $this->assertSame(['search'], $field['filters']);
    }

    public function testMaxPosts()
    {
        $field = Relationship::make('Max Posts')->maxPosts(10)->get();
        $this->assertSame(10, $field['max']);
    }

    public function testMinPosts()
    {
        $field = Relationship::make('Min Posts')->minPosts(5)->get();
        $this->assertSame(5, $field['min']);
    }
}
