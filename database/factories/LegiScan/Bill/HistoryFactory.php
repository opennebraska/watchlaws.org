<?php

namespace Database\Factories\LegiScan\Bill;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'history_step' => $this->faker->randomNumber(3),
            'history_major' => $this->faker->randomElement([0, 1]),
            'history_date' => $this->faker->date(),
            'history_action' => $this->faker->sentence(),
        ];
    }
}
