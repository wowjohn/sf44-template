<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->notPath('src/Kernel.php')
    ->exclude('var')
    ->exclude('src/Entity')
    ->exclude('src/Migrations')
    ->exclude('src/Repository')
    ->exclude('apollo')
    ->exclude('bin')
    ->exclude('config')
    ->exclude('docs')
    ->exclude('node_modules')
    ->exclude('public')
    ->exclude('templates')
    ->exclude('tests')
    ->exclude('vendor');

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        '@Symfony' => true,
        '@DoctrineAnnotation' => true,
        '@PhpCsFixer' => true,
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'whitespace_after_comma_in_array' => true,
        'standardize_not_equals' => true,
        'single_quote' => true,
        'single_blank_line_before_namespace' => true,
        'no_useless_else' => true,
        'no_unused_imports' => true,
        'not_operator_with_successor_space' => true,
        'not_operator_with_space' => false,
        'multiline_comment_opening_closing' => true,
        'native_function_casing' => true,
        'no_empty_comment' => true,
        'no_leading_import_slash' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'no_trailing_whitespace' => true,
        'cast_spaces' => false,
        'array_syntax' => ['syntax' => 'short'],
        'single_line_comment_style' => [
            'comment_types' => [
            ],
        ],
         'concat_space' => [
            'spacing' => 'one'
        ],
       'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],
    ])
    ->setFinder($finder)
    ->setUsingCache(false);
