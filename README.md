Laravel Basic Task List
=======================

[![Build Status](https://travis-ci.org/amercier/laravel-basic-task-list.svg)](https://travis-ci.org/amercier/laravel-basic-task-list)

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

1. Run (in project directory):
```
composer create-project
composer install
```

### Start

#### Local environment: 

1. Run
```
php artisan serve
```
2. Visit http://localhost:8000/

Note: in `local` environment, SQLite is used as database.

#### Using Homestead

1. Run (in project directory):
```
composer run homestead-init
```
2. Visit http://localhost:8080/

Note: in `homestead` environment, MySQL is used as database.

Licence
-------

This project is licensed under the [ISC License](./LICENSE.md).
