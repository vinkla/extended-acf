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
use Extended\ACF\Tests\Fields\Settings\Instructions;
use Extended\ACF\Tests\Fields\Settings\Nullable;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\ReturnFormat;
use Extended\ACF\Tests\Fields\Settings\Wrapper;
use InvalidArgumentException;

class TaxonomyTest extends FieldTestCase
{
    use ConditionalLogic;
    use Instructions;
    use Nullable;
    use Required;
    use ReturnFormat;
    use Wrapper;

    public string $field = Taxonomy::class;
    public string $type = 'taxonomy';

    public function testAppearance()
    {
        $field = Taxonomy::make('Appearance')->appearance('checkbox')->get();
        $this->assertSame('checkbox', $field['field_type']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument field type [test].');

        Taxonomy::make('Invalid Appearance')->appearance('test')->get();
    }

    public function testCanAddTerm()
    {
        $field = Taxonomy::make('Add Term')->addTerm(false)->get();
        $this->assertFalse($field['add_term']);
    }

    public function testLoadTerms()
    {
        $field = Taxonomy::make('Load Terms')->loadTerms(false)->get();
        $this->assertFalse($field['load_terms']);
    }

    public function testShouldSaveTerms()
    {
        $field = Taxonomy::make('Save Terms')->saveTerms(false)->get();
        $this->assertFalse($field['save_terms']);
    }

    public function testTaxonomy()
    {
        $field = Taxonomy::make('Taxonomy')->taxonomy('category')->get();
        $this->assertSame('category', $field['taxonomy']);
    }
}
