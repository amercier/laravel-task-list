<?php
header('Content-type: text/plain');
header('Content-Encoding: none');

function disable_ob()
{
    @ini_set('zlib.output_compression', 0);
    @ini_set('implicit_flush', 1);
    for ($i = 0; $i < ob_get_level(); $i++) {
        ob_end_flush();
    }
    ob_implicit_flush(1);
    header('Expires: Fri, 01 Jan 1990 00:00:00 GMT');
    header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
    header('Pragma: no-cache');
    header('Connection: close');
}

chdir(dirname(__DIR__));
disable_ob();
$php = 'HOME="' . dirname(dirname(__DIR__)) . '" /usr/local/php7.0/bin/php -d safe_mode_allowed_env_vars=';

// Composer installation
if (file_exists('composer.phar')) {
    echo 'Composer already installed!' . PHP_EOL;
} else {
    echo 'Installing Composer...' . PHP_EOL;
    copy('https://getcomposer.org/installer', 'composer-setup.php');
    if (hash_file('SHA384', 'composer-setup.php') ===
        '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061'
    ) {
        echo 'Composer installer verified' . PHP_EOL;
    } else {
        echo 'Composer installer corrupt' . PHP_EOL;
        unlink('composer-setup.php');
    }
    echo system($php . ' composer-setup.php 2>&1');
    echo 'Composer installed successfully' . PHP_EOL;
}

// Run post-installation script
echo 'Running post-installation script...' . PHP_EOL;
echo system($php . ' composer.phar run post-deploy 2>&1');
echo 'Post-installation finished successfully' . PHP_EOL;
