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

use Extended\ACF\Fields\FlexibleContent;
use Extended\ACF\Fields\Layout;
use Extended\ACF\Fields\Text;
use Extended\ACF\Tests\Fields\Settings\ButtonLabel;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class FlexibleContentTest extends FieldTestCase
{
    use ButtonLabel;
    use ConditionalLogic;
    use HelperText;
    use Required;
    use Wrapper;

    public string $field = FlexibleContent::class;
    public string $type = 'flexible_content';

    public function testLayouts()
    {
        $field = FlexibleContent::make('Layouts')
            ->layouts([
                Layout::make('Image')
                    ->fields([
                        Text::make('Title'),
                    ]),
            ])
            ->get();

        $this->assertSame('Image', $field['layouts'][0]['label']);
        $this->assertSame('Title', $field['layouts'][0]['sub_fields'][0]['label']);
    }

    public function testMaxLayouts()
    {
        $field = FlexibleContent::make('Max Layouts')->maxLayouts(10)->get();
        $this->assertSame(10, $field['max']);
    }

    public function testMinLayouts()
    {
        $field = FlexibleContent::make('Min Layouts')->minLayouts(5)->get();
        $this->assertSame(5, $field['min']);
    }
}
