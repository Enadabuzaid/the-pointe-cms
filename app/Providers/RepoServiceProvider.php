<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\TenantsCategoryRepositoryInterface',
            'App\Repository\TenantsCategoryRepository');

        $this->app->bind(
            'App\Repository\TenantsRepositoryInterface',
            'App\Repository\TenantsRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
