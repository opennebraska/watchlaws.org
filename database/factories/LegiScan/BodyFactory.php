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

        $bodyName = ucfirst($this->faker->text(80));
        $roleName = ucfirst($this->faker->text(80));

        return [
            'body_id' => $increment++,
            // 'state_id' => null,  //
            // 'role_id' => null,   // Global role: Represenative, Senator, Joint Conference
            'body_abbr' => $bodyName[0],
            'body_short' => substr($bodyName, 0, 10),
            'body_name' => $bodyName,
            'body_role_abbr' => substr($roleName, 3),
            'body_role_name' => $roleName,
        ];
    }
}
