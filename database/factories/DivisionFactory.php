<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Division>
 */
class DivisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company(),
            'address' => $this->faker->unique()->address(),
            'telephone' => $this->faker->phoneNumber(),
            'company_id' => 1,
            'country_id' => Country::all()->random()->id,
            'city_id' => City::all()->random()->id,
            'location_manager' => User::role(['manager'])->get()->random()->id,
        ];
    }
}
