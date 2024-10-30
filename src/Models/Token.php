<?php

namespace Webdecero\Laravel\Passport\Models;

use Jenssegers\Agent\Agent;

use MongoDB\Laravel\Eloquent\DocumentModel;
use Laravel\Passport\Token as TokenPassport;

class Token extends TokenPassport
{
    use DocumentModel;
    // protected $primaryKey = '_id';
    // protected $keyType = 'string';


    public function __construct()
    {
        $agent = new Agent();
        // $agent->setUserAgent(request()->header('User-Agent'));

        $agent->setHttpHeaders(request()->header() ?? []);
        $this->attributes['ip'] = request()->ip() ?? 'not_found';
        $this->attributes['user-agent'] = request()->header('User-Agent') ?? 'not_found';
        $this->attributes['model'] = $agent->device() != false ? $agent->device() : 'not_found';
        $this->attributes['platform'] = $agent->platform() != false ? $agent->platform() : 'not_found';
        $this->attributes['browser'] = $agent->browser() != false ? $agent->browser() : 'not_found';
        $this->attributes['device'] = $agent->isDesktop() ? 'desktop' : ($agent->isPhone() ? 'phone' : 'not_found');
    }

        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'scopes' => 'array',
        'revoked' => 'bool',
        'expires_at' => 'datetime',
    ];
}
