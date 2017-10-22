<?php

return [
    'laravel-basic-task-list.amercier.com' => [
        'remote' => 'ftp://'
            . getenv('DEPLOY_FTP_USERNAME') . ':' . getenv('DEPLOY_FTP_PASSWORD')
            . '@ftp.amercier.com/laravel-basic-task-list',
        'local' => '.',
        'ignore' => implode([
            '.git',
            'node_modules',
            '.htdeployment',
            '*.sqlite',
            '*.log'
        ], "\n"),
        'allowDelete' => true,
        'purge' => ['temp/cache'],
        'preprocess' => false,
        'after' => [
            'remote: mv .env.production .env'
        ]
    ],
    'tempDir' => __DIR__ . '/temp',
    'colors' => true,
];
