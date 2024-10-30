<?php

namespace Webdecero\Laravel\Passport\Models;

use Laravel\Passport\RefreshToken as ExtendPassport;

use MongoDB\Laravel\Eloquent\DocumentModel;

class RefreshToken extends ExtendPassport
{
    use DocumentModel;
    // protected $primaryKey = '_id';
    // protected $keyType = 'string';
}
