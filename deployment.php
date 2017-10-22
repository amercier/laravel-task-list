<?php

return [
    'laravel-basic-task-list.amercier.com' => [
        'remote' => 'ftp://'
            . getenv('DEPLOY_FTP_USERNAME') . ':' . getenv('DEPLOY_FTP_PASSWORD')
            . '@ftp.amercier.com/laravel-basic-task-list',
        'local' => '.',
        'ignore' => file_get_contents('.deployignore'),
        'allowDelete' => true,
        'purge' => ['temp/cache'],
        'preprocess' => false,
        'after' => [
            'upload: .env.production .env'
        ]
    ],
    'tempDir' => __DIR__ . '/temp',
    'colors' => true,
];
