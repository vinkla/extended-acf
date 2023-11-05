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

use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Text;
use Extended\ACF\Tests\Fields\Settings\ButtonLabel;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\Fields;
use Extended\ACF\Tests\Fields\Settings\HelperText;
use Extended\ACF\Tests\Fields\Settings\Layout;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class RepeaterTest extends FieldTestCase
{
    use ButtonLabel;
    use ConditionalLogic;
    use Fields;
    use HelperText;
    use Layout;
    use Required;
    use Wrapper;

    public string $field = Repeater::class;
    public string $type = 'repeater';

    public function testCollapsed()
    {
        $field = Repeater::make('Collapsed')
            ->fields([
                Text::make('Title'),
            ])
            ->collapsed('title')
            ->get();

        $this->assertSame('field_eedb3216', $field['collapsed']);
    }

    public function testPaginated()
    {
        $field = Repeater::make('Paginated')->paginated(10)->get();

        $this->assertTrue($field['pagination']);
        $this->assertSame(10, $field['rows_per_page']);
    }

    public function testMaxRows()
    {
        $field = Repeater::make('Max Rows')->maxRows(10)->get();
        $this->assertSame(10, $field['max']);
    }

    public function testMinRows()
    {
        $field = Repeater::make('Min Rows')->minRows(5)->get();
        $this->assertSame(5, $field['min']);
    }
}
