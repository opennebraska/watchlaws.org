<?php

/**
 * CONFIG
 */
$dirs = [
    __DIR__ . '/app/',
    __DIR__ . '/tests/',
    __DIR__ . '/database/',
    __DIR__ . '/routes/',
    __DIR__ . '/config/',
    __DIR__ . '/resources/',
];
$excludeDirs = [];

$excludePaths = [];

$rules = [
    '@PSR2'                                       => true,
    'array_syntax'                                => ['syntax' => 'short'],
    'binary_operator_spaces'                      => ['operators' => ['=>' => 'align', '=' => 'align']],
    'blank_line_after_opening_tag'                => true,
    'blank_line_before_statement'                 => ['statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try']],
    'cast_spaces'                                 => ['space' => 'single'],
    'concat_space'                                => ['spacing' => 'one'],
    'declare_equal_normalize'                     => ['space' => 'none'],
    'function_typehint_space'                     => true,
    'heredoc_to_nowdoc'                           => true,
    'include'                                     => true,
    'linebreak_after_opening_tag'                 => true,
    'lowercase_cast'                              => true,
    'magic_constant_casing'                       => true,
    'class_attributes_separation'                 => true,
    'native_function_casing'                      => true,
    'no_blank_lines_after_class_opening'          => true,
    'no_blank_lines_after_phpdoc'                 => true,
    'no_blank_lines_before_namespace'             => false,
    'no_empty_comment'                            => true,
    'no_empty_phpdoc'                             => true,
    'no_empty_statement'                          => true,
    'no_extra_blank_lines'                        => ['tokens' => ['extra']],
    'no_leading_import_slash'                     => true,
    'no_leading_namespace_whitespace'             => true,
    'no_mixed_echo_print'                         => ['use' => 'echo'],
    'no_multiline_whitespace_around_double_arrow' => true,
    'multiline_whitespace_before_semicolons'      => true,
    'no_short_bool_cast'                          => true,
    'no_singleline_whitespace_before_semicolons'  => true,
    'no_spaces_around_offset'                     => ['positions' => ['inside']],
    'no_trailing_comma_in_singleline'             => true,
    'no_unneeded_control_parentheses'             => ['statements' => ['break', 'clone', 'continue', 'echo_print', 'return', 'switch_case', 'yield']],
    // https://github.com/FriendsOfPHP/PHP-CS-Fixer/issues/4159
    // 'no_unused_imports'                           => true,
    'no_whitespace_before_comma_in_array'         => true,
    'no_whitespace_in_blank_line'                 => true,
    'normalize_index_brace'                       => true,
    'object_operator_without_whitespace'          => true,
    'phpdoc_indent'                               => true,
    'general_phpdoc_tag_rename'                   => true,
    'phpdoc_inline_tag_normalizer'                => true,
    'phpdoc_tag_type'                             => true,
    'phpdoc_no_access'                            => true,
    'phpdoc_no_useless_inheritdoc'                => true,
    'phpdoc_scalar'                               => true,
    'phpdoc_single_line_var_spacing'              => true,
    'phpdoc_trim'                                 => true,
    'phpdoc_types'                                => true,
    'phpdoc_var_without_name'                     => false,
    'return_type_declaration'                     => ['space_before' => 'none'],
    'self_accessor'                               => false,
    'short_scalar_cast'                           => true,
    'single_line_comment_style'                   => ['comment_types' => ['hash']],
    'single_quote'                                => true,
    'space_after_semicolon'                       => true,
    'standardize_not_equals'                      => true,
    'ternary_operator_spaces'                     => true,
    'trailing_comma_in_multiline'                 => true,
    'trim_array_spaces'                           => true,
    'unary_operator_spaces'                       => true,
    'whitespace_after_comma_in_array'             => true,
    'ordered_imports'                             => ['sort_algorithm' => 'length'],
];

/**
 * CREATE FINDER
 */
$finder = PhpCsFixer\Finder::create()->in($dirs);

foreach ($excludeDirs as $dir) {
    $finder->exclude($dir);
}
foreach ($excludePaths as $path) {
    $finder->notPath($path);
}

return (new PhpCsFixer\Config())->setRules($rules)
    ->setUsingCache(false)
    ->setFinder($finder);
