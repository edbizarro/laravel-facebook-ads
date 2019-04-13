<?php

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
      '@PSR2' => true,
      'array_syntax' => ['syntax' => 'short'],
      'no_multiline_whitespace_before_semicolons' => true,
      'no_short_echo_tag' => true,
      'no_unused_imports' => true,
      'not_operator_with_successor_space' => true,
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in('src')
            ->in('tests')
            ->exclude([
              'vendor',
              'node_modules',
            ])
            ->notName('*.md')
            ->notName('*.xml')
            ->notName('*.yml')
            ->notName('*.lock')
            ->notName('_ide_helper.php')
            ->notName('_ide_helper_models.php')
            ->notName('.phpstorm.meta.php')

    );
