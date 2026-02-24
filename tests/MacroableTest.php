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

use Extended\ACF\Fields\Text;
use PHPUnit\Framework\TestCase;

class MacroableTest extends TestCase
{
    public function testMacro(): void
    {
        Text::macro('translatable', function ($field) {
            $this->settings['translatable'] = true;

            return $this;
        });

        $field = Text::make('Macroable Macro Title')->translatable();
        $settings = $field->toArray('field_macroable_macro');

        $this->assertTrue($settings['translatable']);
    }

    public function testMacroWithFieldParameter(): void
    {
        Text::macro('fieldParam', fn($field) => $field->withSettings(['fieldParam' => true]));

        $field = Text::make('Macroable Param Title')->fieldParam();
        $settings = $field->toArray('field_macroable_param');

        $this->assertTrue($settings['fieldParam']);
    }

    public function testMacroWithParameters(): void
    {
        Text::macro('locale', function ($field, string $locale) {
            $this->settings['locale'] = $locale;

            return $this;
        });

        $field = Text::make('Macroable Locale Title')->locale('sv_SE');
        $settings = $field->toArray('field_macroable_locale');

        $this->assertSame('sv_SE', $settings['locale']);
    }

    public function testHasMacro(): void
    {
        $this->assertFalse(Text::hasMacro('customMethod'));

        Text::macro('customMethod', fn() => $this);

        $this->assertTrue(Text::hasMacro('customMethod'));
    }

    public function testUndefinedMacroThrowsException(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->expectExceptionMessage('Method Extended\ACF\Fields\Text::undefinedMethod does not exist.');

        Text::make('Title')->undefinedMethod();
    }
}
