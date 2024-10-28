<?php

namespace Webdecero\Laravel\Passport;

use Laravel\Passport\Passport;

use Illuminate\Support\ServiceProvider;


// use Webdecero\Manager\Api\Models\Passport\Token;
// use Webdecero\Manager\Api\Models\Passport\Client;
// use Webdecero\Manager\Api\Models\Passport\AuthCode;
// use Webdecero\Manager\Api\Models\Passport\RefreshToken;
// use Webdecero\Manager\Api\Models\Passport\ClientCommand;
// use Webdecero\Manager\Api\Models\Passport\TokenRepository;
// use Webdecero\Manager\Api\Models\Passport\PersonalAccessClient;

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


        // Passport::tokensExpireIn(now()->addYears(10));
        // Passport::personalAccessTokensExpireIn(now()->addWeeks(8));

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


        Passport::ignoreMigrations();

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Laravel\Passport\TokenRepository', TokenRepository::class);
        $loader->alias('Laravel\Passport\Console\ClientCommand', ClientCommand::class);

    }


}
