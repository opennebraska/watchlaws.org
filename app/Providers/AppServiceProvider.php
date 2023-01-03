<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Factory::macro('makeId', function () {
            return ($this->model::all()->max('id') ?? 0) + 1;
        });

        // Fix that allows long index names in migrations
        // See https://laravel.com/docs/9.x/migrations#index-lengths-mysql-mariadb
        Schema::defaultStringLength(191);
    }
}
