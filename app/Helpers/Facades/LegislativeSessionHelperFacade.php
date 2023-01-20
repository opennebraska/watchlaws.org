<?php

namespace App\Helpers\Facades;

use Illuminate\Support\Facades\Facade;

class LegislativeSessionHelperFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'legislativeSessionHelper';
    }
}
