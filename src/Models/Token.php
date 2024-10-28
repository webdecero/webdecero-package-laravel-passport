<?php
namespace Webdecero\Laravel\Passport\Models;

use Jenssegers\Agent\Agent;

use Laravel\Passport\Passport;

use MongoDB\Laravel\Eloquent\Model;
use Laravel\Passport\ResolvesInheritedScopes;

class Token extends Model
{
    use ResolvesInheritedScopes;

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
        $this->attributes['device'] =   $agent->isDesktop()? 'desktop': ($agent->isPhone()?'phone': 'not_found');
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_access_tokens';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $guarded = [];

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

    /**
     * Get the client that the token belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Passport::clientModel());
    }

    /**
     * Get the user that the token belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        $provider = config('auth.guards.api.provider');

        $model = config('auth.providers.' . $provider . '.model');

        return $this->belongsTo($model, 'user_id', (new $model)->getKeyName());
    }

    /**
     * Determine if the token has a given scope.
     *
     * @param  string  $scope
     * @return bool
     */
    public function can($scope)
    {
        if (in_array('*', $this->scopes)) {
            return true;
        }

        $scopes = Passport::$withInheritedScopes
            ? $this->resolveInheritedScopes($scope)
            : [$scope];

        foreach ($scopes as $scope) {
            if (array_key_exists($scope, array_flip($this->scopes))) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if the token is missing a given scope.
     *
     * @param  string  $scope
     * @return bool
     */
    public function cant($scope)
    {
        return !$this->can($scope);
    }

    /**
     * Revoke the token instance.
     *
     * @return bool
     */
    public function revoke()
    {
        return $this->forceFill(['revoked' => true])->save();
    }

    /**
     * Determine if the token is a transient JWT token.
     *
     * @return bool
     */
    public function transient()
    {
        return false;
    }
}
