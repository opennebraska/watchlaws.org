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
            'id'            => $this->makeId(),
            'name'          => $this->faker->sentence,
            'title'         => $this->faker->sentence,
            'tag'           => Arr::random(['Regular Session']),
            'starting_year' => Arr::random(range(2020, now()->format('Y'))),
            'ending_year'   => now()->format('Y'),
        ];
    }
}
