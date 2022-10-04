<?php

namespace Database\Factories\LegiScan;

use Illuminate\Support\Arr;
use App\Models\LegiScan\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StateFactory extends Factory
{
    public $model = State::class;

    public function definition()
    {
        return [
            'id'           => (State::all()->max('id') ?? 0) + 1,
            'name'         => $this->faker->state,
            'abbreviation' => $this->faker->stateAbbr,
            'biennium'     => rand(0, 1),
            'carry_over'   => Arr::random(State::getEnum('carryOver')),
            'capitol'      => $this->faker->city,
            'latitude'     => $this->faker->latitude,
            'longitude'    => $this->faker->longitude,
        ];
    }
}
