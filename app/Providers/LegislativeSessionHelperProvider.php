<?php

namespace App\Providers;

use App\Helpers\LegislativeSessionHelper;
use Illuminate\Support\ServiceProvider;

class LegislativeSessionHelperProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('legislativeSessionHelper',function(){
            return app(LegislativeSessionHelper::class);
        });
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
