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

use Error;
use Extended\ACF\ConditionalLogic;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Text;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\VarDumper\VarDumper;

class FieldTest extends TestCase
{
    public function testLabel()
    {
        $field = Text::make('Label')->toArray();
        $this->assertSame('Label', $field['label']);
    }

    public function testName()
    {
        $field = Text::make('Label Name')->toArray();
        $this->assertSame('label_name', $field['name']);

        $field = Text::make('Custom Name', 'custom_name')->toArray();
        $this->assertSame('custom_name', $field['name']);
    }

    public function testKey()
    {
        $field = Text::make('Key')->toArray();
        $this->assertSame('field_722bfe15', $field['key']);
    }

    public function testCustomKey()
    {
        $field = Text::make('Custom Key')->key('field_123456')->toArray();
        $this->assertSame('field_123456', $field['key']);
    }

    public function testKeyUniqueness()
    {
        $this->expectExceptionMessage('The key [field_16217cde] is not unique.');
        Text::make('Key Uniqueness 1')->key('field_16217cde');
        Text::make('Key Uniqueness 2')->key('field_16217cde');
    }

    public function testKeyPrefix()
    {
        $this->expectExceptionMessage('The key should have the prefix [field_].');
        Text::make('Key refix')->key('phone')->toArray();
    }

    public function testWithSettings()
    {
        $field = Text::make('With Settings')->withSettings(['custom' => 'setting'])->toArray();
        $this->assertSame('setting', $field['custom']);

        $this->expectException(InvalidArgumentException::class);
        Text::make('With Settings Label')->withSettings(['label' => 'invalid'])->toArray();
    }

    public function testDump()
    {
        $log = [];

        VarDumper::setHandler(function ($value) use (&$log) {
            $log[] = $value;
        });

        Text::make('Dump')->dump(1, 2);

        $this->assertSame([['label' => 'Dump', 'name' => 'dump', 'type' => 'text', 'key' => 'field_076f7d8c'], 1, 2], $log);

        VarDumper::setHandler(null);
    }

    public function testSettingsPropertyIsReadable()
    {
        $field = Text::make('Settings Test', 'settings_test');

        $this->assertIsArray($field->settings);
        $this->assertSame('Settings Test', $field->settings['label']);
        $this->assertSame('settings_test', $field->settings['name']);
    }

    public function testSettingsPropertyCannotBeModifiedExternally()
    {
        $field = Text::make('Settings Write Test');

        $this->expectException(Error::class);
        $this->expectExceptionMessage('Cannot modify protected(set) property');
        $field->settings = ['label' => 'Modified'];
    }

    public function testToArrayDoesNotMutateSettings()
    {
        $field = Text::make('Immutable Settings')
            ->conditionalLogic([ConditionalLogic::where('type', '==', 'page')]);

        $field->toArray('group');

        $this->assertArrayNotHasKey('key', $field->settings);
        $this->assertArrayNotHasKey('type', $field->settings);
        $this->assertInstanceOf(ConditionalLogic::class, $field->settings['conditional_logic'][0]);
    }

    public function testToArrayAllowsReusedFieldInstances()
    {
        $shared = Text::make('Shared', 'shared')
            ->conditionalLogic([ConditionalLogic::where('enabled', '==', 1)]);

        $field = Group::make('Reusable Fields')
            ->fields([
                Group::make('One')->fields([$shared]),
                Group::make('Two')->fields([$shared]),
            ])
            ->toArray('group');

        $this->assertSame('shared', $field['sub_fields'][0]['sub_fields'][0]['name']);
        $this->assertSame('shared', $field['sub_fields'][1]['sub_fields'][0]['name']);
        $this->assertNotSame(
            $field['sub_fields'][0]['sub_fields'][0]['key'],
            $field['sub_fields'][1]['sub_fields'][0]['key'],
        );
        $this->assertInstanceOf(ConditionalLogic::class, $shared->settings['conditional_logic'][0]);
    }

    public function testToArrayThrowsOnReusedInstanceUnderSameParent()
    {
        $shared = Text::make('Shared', 'shared');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('The key [group_duplicates_shared] is not unique.');

        Group::make('Duplicates')->fields([$shared, $shared])->toArray('group');
    }
}
