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
        static $increment = 1;

        return [
            'committee_id' => $increment++,
            // 'committee_body_id' => null,
            'committee_name' => $this->faker->sentence,
        ];
    }
}
