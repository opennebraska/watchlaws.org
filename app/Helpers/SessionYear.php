<?php

namespace App\Helpers;

use App\Models\LegiScan\Session;

class SessionYear
{
    public function getAll()
    {
        return collect(
            Session::select('year_start', 'year_end')
                ->get()
                ->toArray()
        )
                ->flatten()
                ->unique();
    }
}
