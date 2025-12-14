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

use Extended\ACF\Fields\Taxonomy;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Nullable;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class TaxonomyTest extends FieldTestCase
{
    use ConditionalLogic;
    use HelperText;
    use Nullable;
    use Required;
    use Wrapper;

    public string $field = Taxonomy::class;
    public string $type = 'taxonomy';

    public function testAppearance()
    {
        $field = Taxonomy::make('Appearance')->appearance('checkbox')->toArray();
        $this->assertSame('checkbox', $field['field_type']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument field type [test].');

        Taxonomy::make('Invalid Appearance')->appearance('test')->toArray();
    }

    public function testFormat()
    {
        $field = Taxonomy::make('Taxonomy Format')->format('id')->toArray();
        $this->assertSame('id', $field['return_format']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument format [test].');

        Taxonomy::make('Invalid Format')->format('test')->toArray();
    }

    public function testCreate()
    {
        $field = Taxonomy::make('Create')->create(false)->toArray();
        $this->assertFalse($field['add_term']);
    }

    public function testLoad()
    {
        $field = Taxonomy::make('Load')->load(false)->toArray();
        $this->assertFalse($field['load_terms']);
    }

    public function testShouldSave()
    {
        $field = Taxonomy::make('Save')->save(false)->toArray();
        $this->assertFalse($field['save_terms']);
    }

    public function testTaxonomy()
    {
        $field = Taxonomy::make('Taxonomy')->taxonomy('category')->toArray();
        $this->assertSame('category', $field['taxonomy']);
    }
}
