<?php

return [
    'laravel-task-list.amercier.com' => [
        'remote' => 'ftp://'
            . getenv('DEPLOY_FTP_USERNAME') . ':' . getenv('DEPLOY_FTP_PASSWORD')
            . '@ftp.amercier.com/' . preg_replace('/^\//', '', getenv('DEPLOY_PATH')),
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
