<?php

namespace Webdecero\Laravel\Passport\Models;

use Laravel\Passport\AuthCode as AuthCodePassport;

use MongoDB\Laravel\Eloquent\DocumentModel;

class AuthCode extends AuthCodePassport
{
    use DocumentModel;
    // protected $primaryKey = '_id';
    // protected $keyType = 'string';
}
