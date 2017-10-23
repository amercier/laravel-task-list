Laravel Task List
=================

[![Build Status](https://travis-ci.org/amercier/laravel-basic-task-list.svg?branch=master)](https://travis-ci.org/amercier/laravel-basic-task-list)

Task List using Laravel PHP framework, based on official
[Basic Task List](https://laravel.com/docs/5.2/quickstart) and
[Intermediate Task List](https://laravel.com/docs/5.2/quickstart-intermediate)
tutorials, adapted for **Laravel 5.5**.

Additional features:
- HTTP tests ([docs](https://laravel.com/docs/5.5/http-tests))
- Browser tests using Laravel Dusk ([docs](https://laravel.com/docs/5.5/dusk)).
- Continuous Integration using [<img alt="Travis CI" src="https://cdn.travis-ci.org/images/favicon-076a22660830dc325cc8ed70e7146a59.png" height="16"> Travis CI](https://travis-ci.org/)
- Continuous Deployment on OVH Perso (no SSH :cold_sweat:)

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
composer run development
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
