<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'        => fake()->company(),
            'type'        => fake()->randomElement(['group', 'workspace', 'topic']),
            'state_abbr'  => Arr::random(array_keys(config('enum.legiscan_states'))),
            'description' => fake()->paragraph(),
        ];
    }
}
