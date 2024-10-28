# Webdecero Patch Laravel Passport (Laravel + MongoDB + Passport)

Patch to enable use of laravel/passport with mongodb/laravel-mongodb.

TODO List

- [ ] V2 laravel 11

## Table of contents

- [Installation](#installation)
- [Configuration](#configuration)
- [Install Artisan Commands](#install-artisan-commands)
- [Examples](#examples)

## Installation

Make sure you have the MongoDB PHP driver installed. You can find installation instructions at:

- <https://www.mongodb.com/docs/drivers/php-drivers/>
- <https://www.mongodb.com/docs/drivers/php/laravel-mongodb/current/quick-start/>

### Requeriments

#### PHP extension

- **php**: ^8.1
- **ext-curl**: *
- **ext-json**: *
- **ext-mbstring**: *
- **Image Processing PHP Extension**: GD | Magic

**WARNING**: The old mongo PHP driver is not supported.

### Laravel version Compatibility

| Laravel | Package | Passport | intervention | laravel-mongodb   |
| :------ | :------ | :------- | :----------- | :---------------- |
| 8.x     | 0.1.x   | x        | v2           | ^3.8              |
| 10.x    | 2.0.x   | 11.10.*  | v3           | ^4.1              |

Installation using composer:

```
composer require webdecero/webdecero-package-manager-api-laravel
```

**Optional** Add the service provider to `config/app.php`:

```php
Webdecero\Manager\Api\ManagerServiceProvider::class,
```

## Configuration

In this new major release which supports the new mongodb PHP extension, we also moved the location of the Model class and replaced the MySQL model class with a trait.

### Env File

```txt

DB_CONNECTION=mongodb
DB_HOST=localhost
DB_AUTHENTICATION_DATABASE=**your database authentication, for global authentication use admin**
DB_DATABASE=**your database**
DB_USERNAME=**your username**
DB_PASSWORD=**your password**
DB_PORT=27017

```
