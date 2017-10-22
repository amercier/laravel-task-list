<?php
chdir(dirname(__DIR__));
shell_exec('php artisan migrate:install');
shell_exec('php artisan migrate');
echo 'Migration finished successfully';
