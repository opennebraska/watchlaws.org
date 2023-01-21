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
            'state_id' => $this->makeId(),
            'state_abbr' => $this->faker->stateAbbr,
            'state_name' => $this->faker->state,
            'biennium' => 0,
            'carry_over' => Arr::random(['YES', 'NO']),
            'capitol' => $this->faker->city,
            'latitude' => $this->faker->randomFloat(),
            'longitude' => $this->faker->randomFloat(),
        ];
    }
}
