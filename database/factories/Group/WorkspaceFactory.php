<?php

namespace Database\Factories\Group;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group\Workspace>
 */
class WorkspaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->company(),
            'state_abbr' => $this->faker->randomElement(array_keys(config('enum.legiscan_states'))),
            'description' => fake()->paragraph(),
        ];
    }
}
