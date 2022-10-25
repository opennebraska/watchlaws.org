<?php

namespace Database\Factories\LegiScan;

use App\Models\LegiScan\Committee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LegiScan\Committee>
 */
class CommitteeFactory extends Factory
{
    protected $model = Committee::class;

    public function definition()
    {
        return [
            'id'   => $this->makeId(),
            'name' => $this->faker->sentence,
        ];
    }
}
