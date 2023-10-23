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

$header = <<<EOF
Copyright (c) Vincent Klaiber

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.

@see https://github.com/vinkla/extended-acf
EOF;

$config = new PhpCsFixer\Config();

$finder = PhpCsFixer\Finder::create()
    ->exclude('examples')
    ->in(__DIR__);

return $config
    ->setRules([
        '@PER-CS' => true,
        'declare_strict_types' => true,
        'header_comment' => [
            'comment_type' => 'PHPDoc',
            'header' => $header,
            'location' => 'after_open',
        ],
        'no_unused_imports' => true,
        'ordered_imports' => true,
        'ordered_traits' => true,
    ])
    ->setFinder($finder)
    ->setRiskyAllowed(true)
    ->setUsingCache(false);
