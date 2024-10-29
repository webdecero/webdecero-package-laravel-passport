# Webdecero Patch Laravel Passport (Laravel + MongoDB + Passport)

Enable use of laravel/passport with mongodb/laravel-mongodb

TODO List

- [ ] V2 laravel 11

## Table of contents

- [Installation](#installation)
- [Configuration](#configuration)

## Installation

Make sure you have the MongoDB PHP driver installed. You can find installation instructions at:

- <https://www.mongodb.com/docs/drivers/php-drivers/>
- <https://www.mongodb.com/docs/drivers/php/laravel-mongodb/current/quick-start/>

### Requeriments

#### PHP extension

- **php**: ^8.1

**WARNING**: The old mongo PHP driver is not supported.

### Laravel version Compatibility

| Laravel | Package | Passport | laravel-mongodb   |
| :------ | :------ | :------- | :---------------- |
| 10.x    | 1.x     | 11.10.*  | ^4.1              |

Installation using composer:

```
composer require webdecero/webdecero-package-laravel-passport
```

**Optional** Add the service provider to `config/app.php`:

```php
Webdecero\Manager\Api\PassportServiceProvider::class,
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
