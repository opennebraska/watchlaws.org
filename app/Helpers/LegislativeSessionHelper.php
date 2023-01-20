<?php

namespace App\Helpers;

use App\Models\LegiScan\Session;
use Carbon\Carbon;

class LegislativeSessionHelper
{
    public function validYears()
    {
        // Assuming session is no more than 2 years (e.g. no third session between start and end years)
        return Session::query()
            ->select('year_start as year')
            ->union(Session::select('year_end as year'))
            ->orderByDesc('year')
            ->get()
            ->pluck('year')
            ->filter(function ($year) { return $year <= Carbon::now()->year; });
    }
}
