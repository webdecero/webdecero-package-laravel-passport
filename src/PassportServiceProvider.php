<?php

namespace Webdecero\Laravel\Passport;

use Laravel\Passport\Passport;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Webdecero\Laravel\Passport\Models\Token;
use Webdecero\Laravel\Passport\Models\Client;
use Webdecero\Laravel\Passport\Models\AuthCode;
use Webdecero\Laravel\Passport\Models\RefreshToken;
use Webdecero\Laravel\Passport\Models\ClientCommand;
use Webdecero\Laravel\Passport\Models\TokenRepository;
use Webdecero\Laravel\Passport\Models\PersonalAccessClient;


//use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class PassportServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {


        Passport::useClientModel(Client::class);
        Passport::useTokenModel(Token::class);
        Passport::useRefreshTokenModel(RefreshToken::class);
        Passport::useAuthCodeModel(AuthCode::class);
        Passport::usePersonalAccessClientModel(PersonalAccessClient::class);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


        $loader = AliasLoader::getInstance();
        $loader->alias('Laravel\Passport\TokenRepository', TokenRepository::class);
        $loader->alias('Laravel\Passport\Console\ClientCommand', ClientCommand::class);

    }


}
