<?php

namespace Webdecero\Laravel\Passport\Models;

use Laravel\Passport\Client as ClientPassport;

use MongoDB\Laravel\Eloquent\DocumentModel;

class Client extends ClientPassport
{
    use DocumentModel;
    // protected $primaryKey = '_id';
    // protected $keyType = 'string';

    protected $casts = [
        // 'grant_types' => 'array',
        // 'scopes' => 'array',
        'personal_access_client' => 'bool',
        'password_client' => 'bool',
        'revoked' => 'bool',
    ];

}
