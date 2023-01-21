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
        $yearStart = now()->year - rand(0, 9);

        return [
            'session_id'        => $this->makeId(),
            'session_name'      => $this->faker->sentence,
            'session_title'     => $this->faker->sentence,
            'session_tag'       => $this->faker->randomElement(['Regular Session']),
            'year_start'        => $yearStart,
            'year_end'          => $this->faker->randomElement([$yearStart, $yearStart + 1]),
        ];
    }
}
