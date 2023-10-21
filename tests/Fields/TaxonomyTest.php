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
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class TaxonomyTest extends TestCase
{
    public function testType()
    {
        $field = Taxonomy::make('Taxonomy')->get();
        $this->assertSame('taxonomy', $field['type']);
    }

    public function testAppearance()
    {
        $field = Taxonomy::make('Taxonomy Appearance')->appearance('checkbox')->get();
        $this->assertSame('checkbox', $field['field_type']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument field type [test].');

        Taxonomy::make('Invalid Taxonomy Appearance')->appearance('test')->get();
    }

    public function testCanAddTerm()
    {
        $field = Taxonomy::make('Taxonomy Add Term')->addTerm(false)->get();
        $this->assertFalse($field['add_term']);
    }

    public function testLoadTerms()
    {
        $field = Taxonomy::make('Taxonomy Load Terms')->loadTerms(false)->get();
        $this->assertFalse($field['load_terms']);
    }

    public function testShouldSaveTerms()
    {
        $field = Taxonomy::make('Taxonomy Save Terms')->saveTerms(false)->get();
        $this->assertFalse($field['save_terms']);
    }

    public function testTaxonomy()
    {
        $field = Taxonomy::make('Taxonomy Taxonomy')->taxonomy('category')->get();
        $this->assertSame('category', $field['taxonomy']);
    }
}
