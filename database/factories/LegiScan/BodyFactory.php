<?php

namespace Database\Factories\LegiScan;

use App\Models\LegiScan\Body;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BodyFactory extends Factory
{
    public $model = Body::class;

    public function definition()
    {
        static $increment = 1;

        $body_name = ucfirst($this->faker->text(80));
        $role_name = ucfirst($this->faker->text(80));

        return [
            'body_id' => $increment++,
            // 'state_id' => null,  //
            // 'role_id' => null,   // Global role: Represenative, Senator, Joint Conference
            'body_abbr' => $body_name[0],
            'body_short' => substr($body_name, 0, 10),
            'body_name' => $body_name,
            'body_role_abbr' => substr($role_name, 3),
            'body_role_name' => $role_name,
        ];
    }
}
