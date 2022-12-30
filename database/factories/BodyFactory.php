<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use App\Models\Body;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LegiScan\Body>
 */
class BodyFactory extends Factory
{
    protected $model = Body::class;

    public function definition()
    {
        return [
             'id'                => $this->makeId(),
             'name'              => Arr::random(Body::getEnum('names')),
             'abbreviation'      => Arr::random(Body::getEnum('abbreviations')),
             'role'              => Arr::random(Body::getEnum('roles')),
             'role_abbreviation' => Arr::random(Body::getEnum('roleAbbreviations')),
        ];
    }
}
