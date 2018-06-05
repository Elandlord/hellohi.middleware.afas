<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
     /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Own Repositories
         */
        $this->app->bind(
            \App\Repositories\MappingRepository::class,
            \App\Repositories\Eloquent\MappingRepository::class
        );

        /**
         * Afas Repositories
         */

        $this->app->bind(
            \App\Repositories\AfasOrganisationRepository::class,
            \App\Repositories\AFAS\AfasOrganisationRepository::class
        );

        $this->app->bind(
            \App\Repositories\AfasPersonRepository::class,
            \App\Repositories\AFAS\AfasPersonRepository::class
        );

        /**
         * HelloHi Repositories
         */
        $this->app->bind(
            \App\Repositories\HHCustomerRepository::class,
            \App\Repositories\HelloHi\HHCustomerRepository::class
        );
        $this->app->bind(
            \App\Repositories\HHPersonRepository::class,
            \App\Repositories\HelloHi\HHPersonRepository::class
        );
    }
}