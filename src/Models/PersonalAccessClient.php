<?php

namespace Webdecero\Laravel\Passport\Models;

use Laravel\Passport\PersonalAccessClient as ExtendPassport;

use MongoDB\Laravel\Eloquent\DocumentModel;

class PersonalAccessClient extends ExtendPassport
{
    use DocumentModel;
    // protected $primaryKey = '_id';
    // protected $keyType = 'string';
}
