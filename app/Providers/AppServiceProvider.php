<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\AFAS\AfasClient;
use HelloHi\ApiClient\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {   
        $this->app->singleton('App\Repositories\AFAS\AfasClient', function ($app) {
            return new AfasClient(
                config('afas.AFAS_BASE_URL'),
                config('afas.AFAS_TOKEN')
            );
        });

        $this->app->singleton('HelloHi\ApiClient\Client', function ($app) {
            return Client::init(
                config('hellohi.API_URL') . "/oauth/token",
                config('hellohi.API_URL'),
                config('hellohi.API_OAUTH_CLIENT_ID'),
                config('hellohi.API_OAUTH_SECRET'),
                config('hellohi.API_USERNAME'),
                config('hellohi.API_PASSWORD'),
                config('hellohi.API_TENANT_ID')
            );
        });
    }
}
