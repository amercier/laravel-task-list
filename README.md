Laravel Basic Task List
=======================

Basic Task List using Laravel PHP framework, based on
[official tutorial](https://laravel.com/docs/5.2/quickstart).

Setup
-----

### Requirements

1. [Homebrew](https://brew.sh/)
2. [VirtualBox](https://www.virtualbox.org/)
3. Vagrant: `brew install vagrant`
4. Composer: `brew tap caskroom/cask && brew cask install vagrant`

### Initial setup

1. Add to `/etc/hosts`:
```
10.0.0.10 laravel-basic-task-list.app
```
2. Run (in project directory):
```
composer install
```
3. Setup local environment settings:
```
cp .env.example .env
```

### Start

1. Run (in project directory):
```
vagrant up
```
2. Migrate database:
```
php artisan migrate
```
3. Visit http://laravel-basic-task-list.app/

Licence
-------

This project is licensed under the [ISC License](./LICENSE.md).
