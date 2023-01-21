<?php

namespace App\Helpers\Models\LegiScan;

use App\Models\LegiScan\Session;

class SessionYear
{
    public function getAll()
    {
        // Assumes session is no more than 2 years (e.g. no third year between the start and end years)
        return collect(Session::select('year_start', 'year_end')->get()->toArray())
            ->flatten()
            ->unique();
    }
}
