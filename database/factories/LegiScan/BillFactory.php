<?php

namespace Database\Factories\LegiScan;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LegiScan\Bill>
 */
class BillFactory extends Factory
{
    public function definition()
    {
        return [
            'bill_number' => 'LB' . $this->faker->randomNumber(4, true),
            'status_date' => $this->faker->date('Y-m-d'),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'pending_committee_id' => 0,
            'legiscan_url' => $this->faker->url(),
            'state_url' => $this->faker->url(),
            'change_hash' => $this->faker->md5(),
            'updated' => $this->faker->dateTime(),
            'created' => $this->faker->dateTime(),
        ];
    }
}
