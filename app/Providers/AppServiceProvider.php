<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        //sobrescribimos la paginacion con la app extension lenght... 
        $this->app->bind(
            \Illuminate\Pagination\LengthAwarePaginator::class,
            \App\Extensions\LengthAwarePaginator::class,
        );
    }
}
