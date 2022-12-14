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

        $this->app->bind(
            'App\Repository\RedirectRepositoryInterface',
            'App\Repository\RedirectRepository');


        $this->app->bind(
            'App\Repository\MenuRepositoryInterface',
            'App\Repository\MenuRepository');

        $this->app->bind(
            'App\Repository\MenuItemRepositoryInterface',
            'App\Repository\MenuItemRepository');

        $this->app->bind(
            'App\Repository\SliderRepositoryInterface',
            'App\Repository\SliderRepository');

        $this->app->bind(
            'App\Repository\SlideRepositoryInterface',
            'App\Repository\SlideRepository');


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
