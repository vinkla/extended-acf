<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/wordplate/extended-acf
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Fields;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Fields\Taxonomy;

class TaxonomyTest extends TestCase
{
    public function testType()
    {
        $field = Taxonomy::make('Taxonomy')->getSettings();
        $this->assertSame('taxonomy', $field['type']);
    }

    public function testAppearance()
    {
        $field = Taxonomy::make('Taxonomy Appearance')->appearance('checkbox')->getSettings();
        $this->assertSame('checkbox', $field['field_type']);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid argument field type [test].');

        Taxonomy::make('Invalid Taxonomy Appearance')->appearance('test')->getSettings();
    }

    public function testCanAddTerm()
    {
        $field = Taxonomy::make('Taxonomy Add Term')->addTerm(false)->getSettings();
        $this->assertFalse($field['add_term']);
    }

    public function testLoadTerms()
    {
        $field = Taxonomy::make('Taxonomy Load Terms')->loadTerms(false)->getSettings();
        $this->assertFalse($field['load_terms']);
    }

    public function testShouldSaveTerms()
    {
        $field = Taxonomy::make('Taxonomy Save Terms')->saveTerms(false)->getSettings();
        $this->assertFalse($field['save_terms']);
    }

    public function testTaxonomy()
    {
        $field = Taxonomy::make('Taxonomy Taxonomy')->taxonomy('category')->getSettings();
        $this->assertSame('category', $field['taxonomy']);
    }
}
