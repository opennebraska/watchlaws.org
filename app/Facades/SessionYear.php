<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SessionYear extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return app(\App\Helpers\SessionYear::class);
    }
}
