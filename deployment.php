<?php

return [
    'laravel-basic-task-list.amercier.com' => [
        'remote' => 'ftp://'
            . getenv('DEPLOY_FTP_USERNAME') . ':' . getenv('DEPLOY_FTP_PASSWORD')
            . '@ftp.amercier.com/laravel-basic-task-list',
        'local' => '.',
        'ignore' => implode([
            '/.git',
            '/node_modules',
            '/vendor',
            '/.env*',
            '*.sqlite',
            '*.log'
        ], "\n"),
        'allowDelete' => true,
        'purge' => ['temp/cache'],
        'preprocess' => false,
        'after' => [
            'upload: .env.production .env',
            'http://laravel-basic-task-list.amercier.com/post-deployment.php'
        ]
    ],
    'tempDir' => __DIR__ . '/temp',
    'colors' => true,
];
