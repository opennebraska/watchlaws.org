<?php

namespace Database\Factories\LegiScan;

use Illuminate\Support\Arr;
use App\Models\LegiScan\Session;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LegiScan\Session>
 */
class SessionFactory extends Factory
{
    protected $model = Session::class;

    public function definition()
    {
        return [
            'session_id'        => $this->makeId(),
            'session_name'      => $this->faker->sentence,
            'session_title'     => $this->faker->sentence,
            'session_tag'       => Arr::random(['Regular Session']),
            'year_start'        => Arr::random(range(2020, now()->format('Y'))),
            'year_end'          => now()->format('Y'),
        ];
    }
}
