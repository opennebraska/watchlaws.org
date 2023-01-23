<?php

namespace Database\Factories;

use App\Models\State;
use Illuminate\Support\Arr;
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
            'id'           => $this->makeId(),
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
