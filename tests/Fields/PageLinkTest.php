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

use Extended\ACF\Fields\PageLink;
use Extended\ACF\Tests\Fields\Settings\ConditionalLogic;
use Extended\ACF\Tests\Fields\Settings\FilterBy;
use Extended\ACF\Tests\Fields\Settings\Instructions;
use Extended\ACF\Tests\Fields\Settings\Multiple;
use Extended\ACF\Tests\Fields\Settings\Nullable;
use Extended\ACF\Tests\Fields\Settings\Required;
use Extended\ACF\Tests\Fields\Settings\Wrapper;

class PageLinkTest extends FieldTestCase
{
    use ConditionalLogic;
    use FilterBy;
    use Instructions;
    use Multiple;
    use Nullable;
    use Required;
    use Wrapper;

    public string $field = PageLink::class;
    public string $type = 'page_link';

    public function testAllowArchives()
    {
        $field = PageLink::make('Archives')->allowArchives()->get();
        $this->assertTrue($field['allow_archives']);
    }

    public function testDisallowArchives()
    {
        $field = PageLink::make('Non-archives')->allowArchives(false)->get();
        $this->assertFalse($field['allow_archives']);
    }
}
