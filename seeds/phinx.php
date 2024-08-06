<?php

return [
    'paths' => [
        'migrations' => 'src/Resources/Migrations',
        'seeds' => 'src/Resources/Seeds'
    ],
    'environments' => [
        'default_migration_table' => 'test_migrations',
        'default_environment' => 'testing',
    ],
    'seed_templates' => [
        'seed_template' => 'storage/seed_template.php',
    ],
];