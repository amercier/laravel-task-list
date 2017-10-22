<?php
chdir(dirname(__DIR__));

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
    shell_exec('php composer-setup.php');
    unlink('composer-setup.php');
    echo 'Composer installed successfully' . PHP_EOL;
}

// Dependencies installation
echo 'Installing dependencies...' . PHP_EOL;
shell_exec('php composer install --no-interaction --prefer-dist --no-dev --optimize-autoloader');
echo 'Dependencies installed successfully' . PHP_EOL;

// Database migration
echo 'Migrating database...' . PHP_EOL;
shell_exec('php artisan migrate:install');
shell_exec('php artisan migrate');
echo 'Migration finished successfully' . PHP_EOL;
